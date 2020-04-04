<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class OrderProduct.
 *
 * @package namespace App\Entities;
 */
class OrderProduct extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'order_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'order_id',
        'name',
        'sku',
        'price',
        'sale_price',
        'quantity',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id', 'order_id');
    }

}
