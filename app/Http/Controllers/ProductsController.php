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
        /**
         *
         */
        /*$description = 'test description';
        $shortdescription = 'short description';
        $strings = '';
        $id = 30;
        $title_id = 4160;
        $sku_id = 146;
        for($i = 1; $i < 1000; $i++){
            $strings .= "INSERT INTO `products` VALUES (".$id++.", 'Áo Sơ Mi Nữ".$title_id++."', 'ao-so-mi-nu-".$title_id++."', '".$description."','".$shortdescription."', '|1|7|', 'SOMINU".$sku_id++."', '250000', '0', 5, '', '', '', NULL, NULL, '1520396250_45835825dd6b2448daf340c2f8d5ef08.jpg', 1, '2018-03-07 11:17:30', '2018-03-07 11:17:30', NULL);";
            $strings .= '<br/>';
        }*/

        $modes = [
            'gallery',
            'list',
            'table'
        ];
        $this->set_mode = 'gallery';
        if(in_array($request->query('mode'), $modes)){
            $this->set_mode = $request->query('mode');
        }

        $data['products'] = $this->getPromotionProducts();
        $data['mode'] = $this->set_mode;
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
