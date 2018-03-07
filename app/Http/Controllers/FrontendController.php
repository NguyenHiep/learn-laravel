<?php

namespace App\Http\Controllers;

use App\Model\Products;
use Illuminate\Http\Request;
use App\Model\Categories;

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
            ->where('status', STATUS_ENABLE)
            ->orderBy('id')
            ->limit($limit)
            ->get();
        return $products;
    }

    protected function getRelatedProducts(int $limit = 8)
    {
        $product = Products::where('status', STATUS_ENABLE)->inRandomOrder()->limit($limit)->get();
        return $product;
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

    /***
     * @param Request $request
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    protected function getPromotionProducts(int $limit = 12)
    {
        // Set limit for pagination
        $list_number = [12, 24, 48];
        $set_limit = request()->query('limit');
        if (in_array($set_limit, $list_number)) {
            $limit = $set_limit;
        }

        // Set parameter sort
        $sort = [
            'column' => 'id',
            'value'  => 'desc',
        ];
        $list_sort = ['new_desc', 'name_asc', 'name_desc', 'price_asc', 'price_desc'];
        $set_sort = request()->query('sort');
        if (in_array($set_sort, $list_sort)) {
            if ($set_sort === 'new_desc') {
                $set_sort = 'id_desc';
            }
            $set_sort = explode('_', $set_sort);
            $sort = [
                'column' => $set_sort[0],
                'value'  => $set_sort[1],
            ];
        }

        $product = Products::where('status', STATUS_ENABLE)
            ->orderBy($sort['column'], $sort['value'])
            ->paginate($limit);
        return $product;
    }

    protected function getMenuProductsCategory()
    {
        $categories = Categories::where('status', STATUS_ENABLE)->get();
        return $categories;
    }

}
