<?php

namespace App\Http\Controllers;

use App\Model\Products;
use Illuminate\Http\Request;
use Session;

class ProductsController extends FrontendController
{
    const PRODUCT_COMPARE_MAX = 3;

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

    public function quick_view(Request $request)
    {
        $product_id = $request->query('product_id');
        $product = Products::where('id', '=', $product_id)->where('status', '=', STATUS_ENABLE)->first();
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

        return response()->view('frontend.theme-ecommerce.products.quickview', ['product' => $product], 200)
            ->header('Content-Type', 'text/html');

    }

    public function add_item_compare(Request $request)
    {
        // TODO: Check function compare
        $product_id = $request->query('product_id');
        $product = Products::where('id', '=', $product_id)->where('status', '=', STATUS_ENABLE)->first();

        if (empty($product)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Data not found']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }
        //session()->flush();
        $total_items = 1;
        if (Session::has('items_compare')) {
            $total_items = count(Session::get('items_compare'));
        }

        if (Session::has('items_compare')) {
            if ($total_items > self::PRODUCT_COMPARE_MAX) {
                return response()->json([
                    'message' => __('system.message.errors', ['errors' => 'So sánh tối đa chỉ được 4 sản phẩm']),
                    'status'  => self::CTRL_MESSAGE_WARNING,
                ]);
            }
            if (in_array($product_id, Session::get('items_compare'))) {
                return response()->json([
                    'message' => __('system.message.errors', ['errors' => $product->name . ' đã tồn tại']),
                    'status'  => self::CTRL_MESSAGE_ERROR,
                ]);
            }
            Session::push('items_compare', $product_id);
        } else {
            Session::push('items_compare', $product_id);
        }

        return response()->json([
            'message'     => __('system.message.errors', ['errors' => $product->name . ' đã được thêm vào so sánh']),
            'status'      => self::CTRL_MESSAGE_INFO,
            'total_items' => $total_items
        ]);


    }

    public function delete_item_compare(Request $request, $id)
    {

    }
}
