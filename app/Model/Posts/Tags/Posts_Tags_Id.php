<?php

namespace App\Model\Posts\Tags;

use App\Model\BaseModel;

class Posts_Tags_Id extends BaseModel
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
