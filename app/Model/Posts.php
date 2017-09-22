<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title',
        'post_author',
        'post_intro',
        'post_full',
        'post_image',
        'post_status',
        'post_format',
        'post_keyword',
        'visit',
        'user_id',
    ];

    /**
     * Get the categories for the blog post.
     */
    public function posts_categories()
    {
        return $this->belongsToMany('App\Model\Posts\Category','posts_category_ids');
    }

    /**
     * Get the tags for the blog post.
     */
    public function posts_tags()
    {
        return $this->belongsToMany('App\Model\Posts\Tags','posts_tags_ids');
    }
}
