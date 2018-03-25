<?php
namespace App\Helppers;
use DB;
trait Cart
{
    public $list_product = [];
    public $total_price  = 0;

    public function getListItemsCart($cartItems)
    {
        if(!empty($cartItems)){
            $ids = [];
            $total_price = 0;
            $this->item_quantity = [];

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
            }
            // Set value for items
            $this->list_product  = $products;
        }

        return $this->list_product;
    }

    public function getToTalPriceCart()
    {
        if(!empty($this->list_product))
        {
            foreach ($this->list_product as $product)
            {
                $this->total_price +=   $product->item_cart_sum;
            }
        }
        return $this->total_price;
    }


}
