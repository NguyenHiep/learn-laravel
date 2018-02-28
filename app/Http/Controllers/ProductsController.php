<?php

namespace App\Http\Controllers;

use App\Model\Products;
use Illuminate\Http\Request;
use Session;

class ProductsController extends FrontendController
{
    public function show(Request $request, $slug){
        $product = Products::where('slug', $slug)->where('status', '=', STATUS_ENABLE)->first();
        if($product == NULL)
        {
            abort(404);
        }
        if(!empty($product->galary_img)){
            $product->galary_img = json_decode($product->galary_img);
        }
        $assignData = [
            'product' => $product
        ];
        return view('frontend.theme-ecommerce.products.detail', $assignData);
    }

    public function quick_view($id)
    {
        $product = Products::find($id)->where('status', '=', STATUS_ENABLE)->first();
        if ($product == null) {
            return response()->json([
                'status'  => self::CTRL_MESSAGE_ERROR,
                'message' => 'Product not found',
                'data'    => ''
            ]);
        }
        if(!empty($product->galary_img)){
            $product->galary_img = json_decode($product->galary_img);
        }

        return response()
            ->view('frontend.theme-ecommerce.products.quickview', ['product' => $product], 200)
            ->header('Content-Type', 'text/html');

    }

    public function add_item_compare(Request $request, $id)
    {
        $product = Products::find($id)->where('status', '=', STATUS_ENABLE)->first();

        if (empty($product)) {
            abort(404);
        }
        //session()->flush();
        if (Session::has('items_compare')) {

            if (!in_array($id, Session::get('items_compare'))) {
                Session::push('items_compare', $id);
            }else{
                return redirect()->back()->with([
                    'message' => __('system.message.errors', ['errors' => 'Sản phẩm đã tồn tại']),
                    'status'  => self::CTRL_MESSAGE_ERROR,
                ]);
            }

        } else {
            Session::push('items_compare', $id);
        }


        return redirect()->back()->with([
            'message' => __('system.message.errors', ['errors' => 'Sản phẩm đã được thêm vào so sánh']),
            'status'  => self::CTRL_MESSAGE_INFO,
        ]);

    }

    public function delete_item_compare(Request $request, $id)
    {

    }
}
