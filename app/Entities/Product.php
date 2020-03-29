<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

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
        'pictures'
    ];

    protected $casts = [
        'galary_img' => 'array'
    ];


}
