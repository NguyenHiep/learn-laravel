<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends BaseModel
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
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
        'user_id',
    ];

    /**
     * Get the categories for the blog post.
     */
    public function posts_categories()
    {
        //return $this->morphToMany('App\Model\Posts\Category', 'posts_category');
        return $this->belongsToMany('App\Model\Posts\Category','posts_category_ids','id','posts_category_id');
    }

    /**
     * Get the tags for the blog post.
     */
    public function posts_tags()
    {
        return $this->belongsToMany('App\Model\Posts\Tags','posts_tags_ids');
    }

    /**
     * Get author for the blog post
     */
    public function author(){
        //return $this->belongsTo('App\Model\User');
        return $this->hasOne('App\Model\User','id','user_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Model\Comments','posts_id','id');
    }


    public function getListAll()
    {
        $posts = Posts::orderBy('id', 'DESC')
            ->where('post_status', STATUS_ENABLE)
            ->paginate(12);
        return $posts;
    }

    public function getPostBySlug($slug)
    {
        $post = Posts::where('post_slug', '=', $slug)
            ->where('post_status', '=', STATUS_ENABLE)
            ->first();
        if (!empty($post)) {
            return $post;
        }
        return false;
    }

    public function getRelatedPost($ids)
    {
        $posts = Posts::where('post_status', '=', STATUS_ENABLE)
            ->whereIn('id', $ids)
            ->get();
        return $posts;
    }

    public function getCommentByPostId($post_id)
    {
        $comments = Posts::find($post_id)->comment()
            ->where('comment_status', STATUS_ENABLE)
            ->paginate(3);
        return $comments;
    }

}
