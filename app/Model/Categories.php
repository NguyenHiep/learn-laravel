<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent_id',
        'image',
        'description',
        'status'
    ];

}
