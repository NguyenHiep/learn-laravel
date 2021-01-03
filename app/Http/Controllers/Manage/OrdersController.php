<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\OrdersDataTable;
use App\Http\Controllers\BackendController;
use App\Jobs\SendEmail;
use App\Mail\OrderConfirm;
use App\Model\Orders;
use App\Model\Settings;
use App\Repositories\OrderRepository;
use App\Repositories\SettingRepository;
use Carbon\Carbon;
use DNS1D;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PDF;

class OrdersController extends BackendController
{
    /**
     * The order repository implementation.
     *
     * @var OrderRepository
     */
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->middleware('permission:order-list', ['only' => ['index']]);
        $this->middleware('permission:order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /***
     * @param array    $data
     * @param int|null $id
     *
     * @return \Illuminate\Validation\Validator
     */
    protected static function validator(array $data)
    {
        return Validator::make($data, [
            'ordered_at'       => 'required|date|date_format:Y-m-d H:i:s|before_or_equal:delivered_at',
            'delivered_at'     => 'required|date|date_format:Y-m-d H:i:s|after_or_equal:ordered_at',
            'status'           => 'required|integer',
            'payment_id'       => 'required|integer',
            'note'             => 'nullable|string',
            'order_deliveries' => 'required|array|min:7'
        ]);
    }


    public function index()
    {
        if (request()->ajax()) {
            $orders = $this->repository->getListOrder();
            $dataTables = new OrdersDataTable($orders);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id' => [
                'label' => __('common.orders.id')
            ],
            'ordered_at' => [
                'label' => __('common.orders.ordered_at')
            ],
            'buyer_name' => [
                'label' => __('common.orders.name'),
                'searchable' => false,
                'orderable'  => false,
            ],
            'buyer_phone_1' => [
                'label'      => __('common.orders.phone'),
                'searchable' => false,
                'orderable'  => false,
            ],
            'total' => [
                'label' => __('common.orders.total')
            ],
            'status' => [
                'label' => __('common.orders.status')
            ],
            'actions' => [
                'label'      => __('common.orders.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = OrdersDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.orders.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('manage.modules.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $record = Orders::with('products', 'deliveries')->findOrFail($id);
        return view('manage.modules.orders.show')->with(['record' => $record]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $record = Orders::with('products', 'deliveries')->findOrFail($id);
        return view('manage.modules.orders.edit')->with(['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $order  = Orders::findOrFail($id);
        $inputs = $request->all();
        if (!empty($inputs['ordered_at'])) {
            $inputs['ordered_at'] = Carbon::createFromFormat('d/m/Y', $inputs['ordered_at'])->format('Y-m-d H:i:s');
        }
        if (!empty($inputs['delivered_at'])) {
            $inputs['delivered_at'] = Carbon::createFromFormat('d/m/Y', $inputs['delivered_at'])->format('Y-m-d H:i:s');
        }
        $order_product    = $inputs['order_products'] ?? [];
        $order_deliveries = $inputs['order_deliveries'] ?? [];
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        try {
            DB::beginTransaction();
            $order->update($inputs);
            if(!empty($order_deliveries)){
                $order->deliveries->update($order_deliveries);
            }
            if (!empty($order_product)) {
                foreach ($order->products as $product) {
                    if (empty($product)) {
                        return abort(404);
                    }
                    $product->update($order_product[$product->product_id]);
                }
            }

            DB::commit();
            return redirect()->route('manage.orders.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->route('manage.orders.edit', ['id' => $order->id])->withInput($inputs)->with([
            'message' => __('system.message.error', ['errors' => 'Update order is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatable(){
        $data['datatable'] = Orders::all();
    }

    public function sentMailConfirm($id)
    {
        $order = Orders::with('products', 'deliveries')->findOrFail($id);
        $settingRepo = app(SettingRepository::class);
        $settings = $settingRepo->getSettings();
        $emailInfo = [
            'subject'   => 'Xác nhận đơn hàng  - #' . format_order_id($order->id),
            'from'      => $settings->email1,
            'from_name' => $settings->email1_name,
            'recipient' => $order->deliveries->buyer_email,
            'content'   => ['order' => $order]
        ];
        dispatch(new SendEmail($emailInfo, 'emails.orders.confirm'));
        return redirect()->route('manage.orders.index')->with([
            'message' => __('system.message.update'),
            'status'  => self::CTRL_MESSAGE_SUCCESS,
        ]);
    }

    public function sentMailShipping($id)
    {
        // TODO: Sent mail confirm shipping order
    }

    public function sentMailInvoice($id)
    {
        // TODO: Sent mail confirm invoice
    }

    public function invoice_index($id)
    {
        $record             = Orders::findOrFail($id);
        $store_info         = Settings::first();
        $data['record']     = $record;
        $data['store_info'] = $store_info;

        return view('manage.modules.orders.invoice', $data);
    }

    public function invoice_print()
    {

    }

    /****
     * General invoice to pdf
     *
     * @param Request $request
     * @param int $orderId
     * @return mixed
     */
    public function exportOrderPdf(Request $request, int $orderId)
    {
        static $FILE_PDF    = 'invoice_%s_%s.pdf';
        $record             = $this->repository->find($orderId);
        $store_info         = app(SettingRepository::class)->getSettings();
        $data['record']     = $record;
        $data['store_info'] = $store_info;
        // Create barcode order deliveries
        DNS1D::getBarcodePNGPath(format_order_id($record->id), 'C128', '1');
        $pdf = PDF::loadView('manage.modules.orders.export_invoice_pdf', $data);
        $name_pdf = printf($FILE_PDF, format_date($record->delivered_at, '%d%m%Y'), str_pad($record->id, 7, '0', 0));
        return $pdf->stream($name_pdf);
    }

}
