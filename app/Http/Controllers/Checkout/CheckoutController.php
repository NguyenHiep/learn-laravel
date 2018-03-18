<?php

namespace App\Http\Controllers\Checkout;

use App\Model\Products;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\FrontendController;

class CheckoutController extends FrontendController
{

    protected static function validate_save($data, $id = null)
    {

        return Validator::make($data, [
            'name'              => 'required|string|unique:products,name,' . $id,
            'slug'              => 'string|unique:products,slug,' . $id,
            'description'       => 'required|string',
            'short_description' => 'string',
            'category_id'       => 'string',
            'sku'               => 'required|string|unique:products,sku,' . $id,
            'price'             => 'required|numeric',
            'sale_price'        => 'numeric',
            'status'            => 'string|numeric',
            'meta_title'        => 'string|max:100',
            'meta_keywords'     => 'string|max:1000',
            'meta_description'  => 'string|max:255',
            'brand_id'          => 'string',
            'galary_img'        => 'array',
            'pictures'          => 'image|max:1024',
        ]);
    }

    public function index()
    {
        $data = [];
        if(Session::has(self::SES_ITEMS_CART)){

            $cartItems = Session::get(self::SES_ITEMS_CART);
            $ids = [];
            $total_price = 0;
            $this->item_quantity = [];
            if(!empty($cartItems)){

                foreach ($cartItems as $cartItem)
                {
                    $ids[] = $cartItem['product_id'];
                    $this->item_quantity[$cartItem['product_id']]['quantity'] = $cartItem['quantity'];
                }


                $products = DB::table('products')
                    ->whereIn('id', $ids)
                    ->get();

                foreach ($products as &$product){
                    $product->item_cart_quantity =  $this->item_quantity[$product->id]['quantity'];
                    $product->item_cart_sum      =  $product->item_cart_quantity * $product->price;
                    $total_price                 +=   $product->item_cart_sum;
                }

                $data['products']    = $products;
                $data['total_price'] = $total_price;
            }

        }

      return view('frontend.theme-ecommerce.checkout.checkout', $data);
    }

    public function save(Request $request)
    {
        $inputs = $request->all();

        $cartItems = Session::get(self::SES_ITEMS_CART);
        echo "<pre>";
            var_dump($cartItems);
        echo "</pre>";
        die("Hiep123");
        echo "<pre>";
            var_dump($request->all());
        echo "</pre>";
        die("Hiep123");
    }


}