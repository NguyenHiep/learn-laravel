<?php

namespace App\Http\Controllers\Manage;

use App\Model\Orders;
use App\Model\Orders\Products;
use App\Model\Orders\Deliveries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
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
        $inputs['order_product_items'] = [];
        foreach ($inputs['order_products'] as $key => $product) {
            $inputs['order_product_items'][]  = [
                'product_id' => $key,
                'quantity'   => $product['quantity']
            ];
        }

        try {
            DB::beginTransaction();
            $order->update($inputs);
            $order->deliveries->update($inputs['order_deliveries']);
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

    public function invoice_index(){
        return view('manage.modules.orders.invoice');
    }

    public function invoice_print(){

    }

    public function export_order(){

    }

}
