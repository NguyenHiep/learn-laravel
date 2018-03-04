<?php

namespace App\Http\Controllers;

use App\Model\Products;

class FrontendController extends Controller
{
    const SES_ITEMS_COMPARE = SESSION_ITEMS_COMPARE;
    const SES_ITEMS_CART    = SESSION_ITEMS_CART;

    protected function getBestsellerProducts(int $limit = 8)
    {

    }

    protected function getNewProducts(int $limit = 8)
    {

    }

    protected function getProductByCategoryId(int $cat_id, int $limit = 8)
    {
        $products = Products::where('category_id', 'like', '%|' . $cat_id . '|%')
            ->orderBy('id')
            ->limit($limit)
            ->get();
        return $products;
    }

    protected function getRelatedProducts(int $limit = 8)
    {

    }

    protected function getRandomProducts(int $limit = 8)
    {
        $product = Products::where('status', STATUS_ENABLE)->inRandomOrder()->limit($limit)->get();
        return $product;
    }

    protected function getSaleProducts(int $limit = 8)
    {
        $product = Products::where('status', STATUS_ENABLE)->inRandomOrder()->limit($limit)->get();
        return $product;
    }

    protected function getPromotionProducts(int $limit = 12)
    {
        $product = Products::where('status', STATUS_ENABLE)->inRandomOrder()->paginate($limit);
        return $product;
    }
}
