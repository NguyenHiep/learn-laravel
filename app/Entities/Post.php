<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Post.
 *
 * @package namespace App\Entities;
 */
class Post extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title',
        'post_slug',
        'post_author',
        'post_intro',
        'post_full',
        'posts_medias_id',
        'post_status',
        'post_format',
        'post_keyword',
        'visit',
        'user_id'
    ];


    /**
     * Get the categories for the blog post.
     */
    public function posts_categories()
    {
        return $this->belongsToMany(PostCategory::class, 'posts_category_ids', 'posts_id', 'posts_category_id')
            ->whereNull('posts_category_ids.deleted_at')
            ->withTimestamps();
    }

    /**
     * Get the tags for the blog post.
     */
    public function posts_tags()
    {
        return $this->belongsToMany(PostTags::class, 'posts_tags_ids', 'posts_id', 'posts_tags_id')
            ->whereNull('posts_tags_ids.deleted_at')
            ->withTimestamps();
    }

    /**
     * Get author for the blog post
     */
    public function author()
    {
        return $this->hasOne('App\Model\User', 'id', 'user_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Model\Comments', 'posts_id', 'id');
    }

    public function media()
    {
        return $this->hasOne('App\Model\Medias', 'id', 'posts_medias_id');
    }


}
