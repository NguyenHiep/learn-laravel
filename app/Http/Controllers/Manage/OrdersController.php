<?php

namespace App\Http\Controllers\Manage;

use App\Model\Orders;
use App\Model\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrdersController extends BackendController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Validate product field
     * @param $data
     * @param null $id
     * @return mixed
     */
    protected static function validator($data, $id = null)
    {

        return Validator::make($data, [

        ]);
    }


    public function index()
    {
        $orders = Orders::Orderby('id', 'desc')->paginate(12);
        return view('manage.modules.orders.index')->with(['records' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Orders::find($id);
        if (empty($record)) {
            return abort(404);
        }
        return view('manage.modules.orders.show')->with(['record' => $record]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Orders::find($id);
        if (empty($record)) {
            return abort(404);
        }
        return view('manage.modules.orders.edit')->with(['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Orders::find($id);
        if (empty($order)) {
            return abort(404);
        }
        $inputs = $request->all();
        // Change input save ordered_at delivered_at
        $validator = self::validator($inputs, $id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        if(isset($inputs['ordered_at'])){
            $inputs['ordered_at'] = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$inputs['ordered_at'])));
        }
        if(isset($inputs['delivered_at'])){
            $inputs['delivered_at'] = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$inputs['ordered_at'])));
        }
        $order_product = [];
        if(isset($inputs['order_products'])){
            $order_product = $inputs['order_products'];
        }
        $order_deliveries = [];
        if(isset($inputs['order_deliveries'])){
            $order_deliveries = $inputs['order_deliveries'];
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
            return redirect()->route('orders.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('orders.edit', ['id' => $order->id])->withInput($inputs)->with([
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

    public function sent_mail_confirm($id)
    {
        // TODO: Sent mail confirm orders
    }

    public function sent_mail_shipping($id)
    {
        // TODO: Sent mail confirm shipping order
    }

    public function sent_mail_invoice($id)
    {
        // TODO: Sent mail confirm invoice
    }

    public function invoice_index($id)
    {
        $record = Orders::find($id);
        if (empty($record)) {
            return abort(404);
        }
        $store_info         = Settings::all()->first();
        $data['record']     = $record;
        $data['store_info'] = $store_info;

        return view('manage.modules.orders.invoice', $data);
    }

    public function invoice_print(){

    }

    public function export_order(){

    }

}
