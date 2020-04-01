<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PostMediaInfo.
 *
 * @package namespace App\Entities;
 */
class PostMediaInfo extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'posts_medias_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'extension',
        'width',
        'height',
        'size',
        'title',
        'caption',
        'alt',
        'description',
        'lightbox',
        'video_length',
        'video_type',
        'video_code_id'
    ];

    public function posts_medias()
    {
        return $this->hasOne(PostMedia::class, 'id', 'id');
    }

}
