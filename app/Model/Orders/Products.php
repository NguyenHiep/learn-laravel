<?php

namespace App\Model\Orders;

use App\Model\BaseModel;
use App\Model\Orders;

class Products extends BaseModel
{

    protected $table = 'order_products';

    protected $fillable = [
        'id',
        'order_id',
        'name',
        'sku',
        'price',
        'sale_price',
        'quantity',
    ];

    public function orders(){
        return $this->hasMany(Orders::class, 'id', 'order_id');
    }

}