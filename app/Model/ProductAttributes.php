<?php

namespace App\Model;

class ProductAttributes extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_attributes';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'product_id',
        'size',
        'sku',
        'price',
        'quantity'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'id', 'product_id');
    }


}
