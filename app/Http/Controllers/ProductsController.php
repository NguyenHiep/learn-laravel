<?php

namespace App\Http\Controllers;

use App\Model\Products;
use Illuminate\Http\Request;

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

    public function quick_view(Request $request, $id){
        //TODO: Check method ajax
    }
}
