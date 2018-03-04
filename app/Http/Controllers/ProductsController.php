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

}
