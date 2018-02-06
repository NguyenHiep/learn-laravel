<?php

namespace App\Model\Orders;

use App\Model\BaseModel;

class Deliveries extends BaseModel
{

    protected $table = 'order_deliveries';

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
        'receiver_address_type',
    ];

    public function orders(){
        return $this->hasOne(Orders::class, 'id', 'order_id');
    }

}