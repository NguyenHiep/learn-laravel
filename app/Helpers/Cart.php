<?php

namespace App\Helpers;

use App\Repositories\ProductRepository;

trait Cart
{
    public $list_product = [];
    public $total_price = 0;
    protected $item_quantity;

    /***
     * Get list items cart
     *
     * @param $cartItems
     * @return array
     */
    public function getListItemsCart($cartItems)
    {
        if (empty($cartItems)) {
            return $this->list_product;
        }
        $ids = [];
        $this->item_quantity = [];
        foreach ($cartItems as $cartItem) {
            $ids[] = $cartItem['product_id'];
            $this->item_quantity[$cartItem['product_id']]['quantity'] = $cartItem['quantity'];
        }
        $this->list_product = app(ProductRepository::class)->getProductByIds($ids);
        // Update value
        foreach ($this->list_product as &$product) {
            $product->item_cart_quantity = $this->item_quantity[$product->id]['quantity'];
            $product->item_cart_sum = (float) $product->item_cart_quantity * $product->actual_price;
            $product->price = (float)$product->price;
            $product->sale_price = (float)$product->sale_price;
            $product->actual_price = (float)$product->actual_price;
            $product->url = route('product.show', ['slug' => $product->slug]);
        }
        return $this->list_product;
    }

    public function getToTalPriceCart()
    {
        if (!empty($this->list_product)) {
            foreach ($this->list_product as $product) {
                $this->total_price += $product->item_cart_sum;
            }
        }
        return $this->total_price;
    }


}
