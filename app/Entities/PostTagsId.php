<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PostTagsId.
 *
 * @package namespace App\Entities;
 */
class PostTagsId extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'posts_tags_ids';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'posts_id',
        'posts_tags_id'
    ];

}
