<?php

namespace App\Model;

use App\Observers\ProductsObserver;

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

}
