<?php

namespace App\Model\Posts;

use App\Model\BaseModel;

class Tags extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Get the posts for the blog post.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Model\Posts','posts_tags_ids');
    }

}
