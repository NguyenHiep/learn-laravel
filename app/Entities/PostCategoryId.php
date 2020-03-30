<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PostCategoryId.
 *
 * @package namespace App\Entities;
 */
class PostCategoryId extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'posts_category_ids';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'posts_id',
        'posts_category_id'
    ];

}
