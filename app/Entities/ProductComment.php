<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use App\Entities\Product as Product;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProductComment.
 *
 * @package namespace App\Entities;
 */
class ProductComment extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'product_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'rate',
        'status',
        'ip_user',
        'product_id',
        'customer_id'
    ];

    /**
     * Get the comment for the product.
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'product_id');
    }
}
