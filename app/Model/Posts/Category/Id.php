<?php

namespace App\Model\Posts\Category;
use Illuminate\Database\Eloquent\Model;

class Posts_Category_Id extends Model
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
