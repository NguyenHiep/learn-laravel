<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends BaseModel implements Transformable
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

    public function comments()
    {
        return $this->hasMany(ProductComment::class, 'product_id', 'id');
    }

}
