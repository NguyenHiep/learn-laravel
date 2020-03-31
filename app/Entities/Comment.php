<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use App\Entities\Post as Post;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Comment.
 *
 * @package namespace App\Entities;
 */
class Comment extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'content',
        'url',
        'rate',
        'comment_status',
        'ip_user',
        'posts_id'
    ];


    /**
     * Get the posts for the blog post.
     */
    public function post()
    {
        return $this->hasOne(Post::class, 'posts_id');
    }
}
