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
    
    protected $casts = [
        'galary_img' => 'array'
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
    
    /***
     * Show promotion product
     * @param ToolbarConfig $config
     * @param array         $options
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPromotionProducts(ToolbarConfig $config, array $options)
    {
        $q = Products::query();
        $q->where('status', STATUS_ENABLE);
        // Filter by price
        $price_from = 0;
        if (!empty($options['price_from'])) {
            $price_from = intval($options['price_from']);
        }
        $price_to = 0;
        if (!empty($options['price_to'])) {
            $price_to = intval($options['price_to']);
        }
        if (!empty($price_to)) {
            $q->whereBetween('price', [$price_from, $price_to]);
        }
        // Filter stock
        $status = $options['status'] ?? '';
        if (!empty($status) && is_array($status)) {
            $q->where(function ($query) use($status){
                if (in_array('in_stock', $status)) {
                    $query->orWhere('quantity', '>', 0);
                }
                if (in_array('out_stock', $status)) {
                    $query->orWhere('quantity', 0);
                }
            });
        
        }
        //TODO: Filter by size, colors, brands
        $product = $q->orderBy($config->sort['column'], $config->sort['value'])->paginate($config->limit);
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

    public function getRelatedProducts(int $id, int $limit = 8)
    {
        $product = Products::where('status', STATUS_ENABLE)->where('id', '!=', $id)->limit($limit)->get();
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
    
    /***
     * Search function
     * @param ToolbarConfig $config
     * @param array         $options
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search(ToolbarConfig $config, array $options)
    {
        $q = Products::query();
        $q->where('status', STATUS_ENABLE)
            ->where(function ($query) use ($config) {
                $query->where('sku', $config->search)
                    ->orWhereRaw("`name` LIKE CONCAT('%', CONVERT('" . $config->search . "', BINARY), '%')")
                    ->orWhere('name', 'like', '%' . $config->search . '%');
            });
        // Filter by price
        $price_from = 0;
        if (!empty($options['price_from'])) {
            $price_from = intval($options['price_from']);
        }
        $price_to = 0;
        if (!empty($options['price_to'])) {
            $price_to = intval($options['price_to']);
        }
        if (!empty($price_to)) {
            $q->whereBetween('price', [$price_from, $price_to]);
        }
        // Filter stock
        $status = $options['status'] ?? '';
        if (!empty($status) && is_array($status)) {
            $q->where(function ($query) use($status){
                if (in_array('in_stock', $status)) {
                    $query->orWhere('quantity', '>', 0);
                }
                if (in_array('out_stock', $status)) {
                    $query->orWhere('quantity', 0);
                }
            });
           
        }
        //TODO: Filter by size, colors, brands
        $product = $q->orderBy($config->sort['column'], $config->sort['value'])->paginate($config->limit);
        return $product;
    }
}
