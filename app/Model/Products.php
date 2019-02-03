<?php

namespace App\Model;

use App\Observers\ProductsObserver;
use App\Helppers\ToolbarConfig;

class Products extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'short_description',
        'category_id',
        'sku',
        'price',
        'sale_price',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'brand_id',
        'galary_img',
        'quantity',
        'pictures',
    ];

    public static function boot() {
        parent::boot();
        Products::observe(new ProductsObserver());
    }

    public function getProductById($id)
    {
        $product = Products::where('id', '=', $id)
            ->where('status', '=', STATUS_ENABLE)
            ->first();
        if (!empty($product))
        {
            return $product;
        }
        return false;
    }

    public function getProductBySlug($slug)
    {
        $product = Products::where('slug', '=', $slug)
            ->where('status', '=', STATUS_ENABLE)
            ->first();
        if (!empty($product))
        {
            return $product;
        }
        return false;
    }

    public function getPromotionProducts(ToolbarConfig $config)
    {
        $product = Products::where('status', STATUS_ENABLE)
            ->orderBy($config->sort['column'], $config->sort['value'])
            ->paginate($config->limit);
        return $product;
    }

    public function getBestsellerProducts(int $limit = 8)
    {

    }

    public function getNewProducts(int $limit = 8)
    {

    }

    public function getProductByCategoryId(ToolbarConfig $config, int $cat_id)
    {
        $products = Products::where('category_id', 'like', '%|' . $cat_id . '|%')
            ->where('status', STATUS_ENABLE)
            ->orderBy($config->sort['column'], $config->sort['value'])
            ->paginate($config->limit);
        return $products;
    }

    public function getRelatedProducts(int $limit = 8)
    {
        $product = Products::where('status', STATUS_ENABLE)->inRandomOrder()->limit($limit)->get();
        return $product;
    }

    public function getRandomProducts(int $limit = 8)
    {
        $product = Products::where('status', STATUS_ENABLE)->inRandomOrder()->limit($limit)->get();
        return $product;
    }

    public function getSaleProducts(int $limit = 8)
    {
        $product = Products::where('status', STATUS_ENABLE)->inRandomOrder()->limit($limit)->get();
        return $product;
    }
    
    public function search(ToolbarConfig $config)
    {
        $product = Products::where('status', STATUS_ENABLE)
            ->where(function ($query) use ($config) {
                $query->where('sku', $config->search)
                    ->orWhereRaw("`name` LIKE CONCAT('%', CONVERT('" . $config->search . "', BINARY), '%')")
                    ->orWhere('name', 'like', '%'.$config->search.'%');
            })
            ->orderBy($config->sort['column'], $config->sort['value'])
            ->paginate($config->limit);
        return $product;
    }
}
