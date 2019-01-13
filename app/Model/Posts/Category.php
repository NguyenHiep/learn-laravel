<?php

namespace App\Model\Posts;

use App\Model\BaseModel;

class Category extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
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
        return $this->belongsToMany(Posts::class,'posts_category_ids');
    }

    // Each category may have one parent
    public function parent() {
        return $this->belongsToOne(static::class, 'category_id');
    }

    // Each category may have multiple children
    public function children() {
        return $this->hasMany(static::class, 'parent_id');
    }



}
