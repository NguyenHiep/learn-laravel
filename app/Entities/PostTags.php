<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use App\Entities\Post as Post;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PostTags.
 *
 * @package namespace App\Entities;
 */
class PostTags extends BaseModel implements Transformable
{
    use TransformableTrait;

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
        'status'
    ];

    /**
     * Get the posts for the blog post.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_tags_ids');
    }

}
