<?php

namespace App\Http\Controllers;

use App\Model\Products;
use Illuminate\Http\Request;
use Redirect;
use Session;

class ProductsController extends FrontendController
{
    const MAX_ITEMS = 6;

    public function promotion(Request $request)
    {
        $data['products'] = $this->getPromotionProducts();
        return view('frontend.theme-ecommerce.products.promotion', $data);
    }

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

    public function view_item_compare(Request $request)
    {
        if (Session::has(self::SES_ITEMS_COMPARE)) {
            $data['products'] = \DB::table('products')
                ->whereIn('id', Session::get(self::SES_ITEMS_COMPARE))
                ->get();
            return view('frontend.theme-ecommerce.products.compare', $data);
        }
        return Redirect::route('home');
    }

    public function add_item_compare(Request $request)
    {
        $product_id = $request->query('product_id');
        $product = Products::where('id', '=', $product_id)->where('status', '=', STATUS_ENABLE)->first();

        if (empty($product)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Data empty']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }
        if (Session::has(self::SES_ITEMS_COMPARE)) {
            $total_items = count(Session::get(self::SES_ITEMS_COMPARE)) + 1;
        } else {
            $total_items = 1;
        }

        if ($total_items <= self::MAX_ITEMS) {
                if (Session::get(self::SES_ITEMS_COMPARE) && in_array($product_id, Session::get(self::SES_ITEMS_COMPARE))) {
                    return response()->json([
                        'message' => __('system.message.errors', ['errors' => $product->name . ' đã tồn tại']),
                        'status'  => self::CTRL_MESSAGE_ERROR,
                    ]);
                } else {
                    Session::push(self::SES_ITEMS_COMPARE, $product_id);
                    return response()->json([
                        'message'     => __('system.message.errors',
                            ['errors' => $product->name . ' đã được thêm vào so sánh']),
                        'status'      => self::CTRL_MESSAGE_INFO,
                        'total_items' => $total_items
                    ]);
                }
        } else {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'So sánh tối đa ' . self::MAX_ITEMS . ' sản phẩm']),
                'status'  => self::CTRL_MESSAGE_WARNING,
            ]);
        }


    }

    public function delete_item_compare(Request $request)
    {
        if (!Session::has(self::SES_ITEMS_COMPARE)) {
            return response()->json([
                'message'     => __('system.message.errors', ['errors' => 'Please add product to compare']),
                'status'      => self::CTRL_MESSAGE_WARNING,
            ]);
        }
       $product_id = $request->query('product_id');
       $product = Products::where('id', '=', $product_id)->where('status', '=', STATUS_ENABLE)->first();
        if (empty($product)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Data empty']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }

        if(in_array($product_id, Session::get(self::SES_ITEMS_COMPARE))){
            foreach (Session::get(self::SES_ITEMS_COMPARE) as $key => $item){
              if($item == $product_id){ // Nếu giá trị bằng nhau thì remove item ra khỏi mảng
                  Session::forget(self::SES_ITEMS_COMPARE.'.'.$key); // Delete item in session arrray
                  $total_items = count(Session::get(self::SES_ITEMS_COMPARE)); // Xóa xong đếm còn bao nhiêu phần tử
                  if ($total_items <= 0) {
                      Session::pull(self::SES_ITEMS_COMPARE);
                  }
                  return response()->json([
                      'message'  => __('system.message.errors', ['errors' => $product->name . ' đã được xóa']),
                      'status'   => self::CTRL_MESSAGE_INFO,
                      'redirect' => route('product.view_compare')
                  ]);
              }
            }
        }
        return response()->json([
            'message'     => __('system.message.errors', ['errors' => $product->name . ' không tồn tại']),
            'status'      => self::CTRL_MESSAGE_ERROR,
        ]);

    }
}
