<?php

namespace App\Model\Posts\Tags;

use Illuminate\Database\Eloquent\Model;

class Posts_Tags_Id extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_tags_ids';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'posts_id',
        'posts_tags_id',
    ];


}
