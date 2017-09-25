<?php

namespace App\Model\Posts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_category';

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
        'name',
        'slug',
        'parent_id',
        'image',
        'description',
    ];

    /**
     * Get the posts for the blog post.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Model\Posts','posts_category_ids');
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
