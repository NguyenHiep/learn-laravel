<?php

namespace App\Http\Controllers\Manage;

use App\Model\Orders;
use App\Model\Orders\Products;
use App\Model\Orders\Deliveries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $orders = Orders::Orderby('id', 'desc')->paginate(12);
        /*$orders = DB::table('orders')
            ->leftJoin('order_products', 'orders.id', '=', 'order_products.order_id')
            ->leftJoin('order_deliveries', 'orders.id', '=', 'order_deliveries.order_id')
            //->select('users.*', 'contacts.phone', 'orders.price')
            ->select('*')
            ->get();
        echo "<pre>";
            var_dump($orders);
        echo "</pre>";
        die("Hiep123");*/
        return view('manage.modules.orders.index')->with(['records' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
