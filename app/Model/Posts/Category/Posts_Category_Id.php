<?php

namespace App\Model\Posts\Category;
use App\Model\BaseModel;

class Posts_Category_Id extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_category_ids';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'posts_id',
        'posts_category_id',
    ];

}
