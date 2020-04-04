<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class OrderDelivery.
 *
 * @package namespace App\Entities;
 */
class OrderDelivery extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'order_deliveries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'order_id',
        'buyer_name',
        'buyer_email',
        'buyer_phone_1',
        'buyer_phone_2',
        'buyer_address',
        'delivery_type',
        'receiver_name',
        'receiver_email',
        'receiver_phone_1',
        'receiver_phone_2',
        'receiver_address_1',
        'receiver_address_2',
        'receiver_address_type'
    ];

    public function orders()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

}
