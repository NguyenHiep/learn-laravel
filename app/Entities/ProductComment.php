<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use App\Entities\Product as Product;
use App\Entities\Customer as Customer;
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
        'id',
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
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get the comment for the product.
     */
    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id');
    }
}
