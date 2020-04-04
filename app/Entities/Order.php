<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Order.
 *
 * @package namespace App\Entities;
 */
class Order extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'ordered_at',
        'delivered_at',
        'sub_total',
        'total',
        'tax_rate',
        'delivery_fee',
        'tax_fee',
        'note',
        'note',
        'status',
        'payment_id'
    ];

    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function deliveries()
    {
        return $this->hasOne(OrderDelivery::class, 'order_id', 'id');
    }

}
