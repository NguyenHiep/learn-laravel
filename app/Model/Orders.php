<?php

namespace App\Model;


use App\Model\Orders\Products;
use App\Model\Orders\Deliveries;

class Orders extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
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
        'payment_id',
        'customer_id'
    ];

    public function setOrderedAtAttribute($value)
    {
        $value = format_date($value, '%Y-%m-%d %H:%M:%S');
        if (empty($value)) {
            $value = '';
        }
        $this->attributes['ordered_at'] = $value;

    }

    public function setDeliveredAtAttribute($value)
    {
        $value = format_date($value, '%Y-%m-%d %H:%M:%S');

        if (empty($value)) {
            $value = '';
        }
        $this->attributes['delivered_at'] = $value;

    }

    public function products()
    {
        return $this->hasMany(Products::class, 'order_id', 'id');
    }

    public function deliveries()
    {
        return $this->hasOne(Deliveries::class, 'order_id', 'id');
    }
}
