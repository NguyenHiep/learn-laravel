<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use App\Entities\Post as Post;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PostCategory.
 *
 * @package namespace App\Entities;
 */
class PostCategory extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'posts_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'image',
        'description',
        'status'
    ];


    /**
     * Get the posts for the blog post.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_category_ids');
    }

    // Each category may have one parent
    public function parent()
    {
        return $this->belongsToOne(static::class, 'category_id');
    }

    // Each category may have multiple children
    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }
}
