<?php

namespace App\Http\Controllers\Checkout;

use App\Model\Products;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;
use App\Http\Controllers\FrontendController;

class CheckoutController extends FrontendController
{

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

    public function add()
    {

    }

    public function edit()
    {

    }

    public function remove()
    {

    }


}