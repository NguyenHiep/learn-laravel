<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use App\Model\User;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PostMedia.
 *
 * @package namespace App\Entities;
 */
class PostMedia extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'posts_medias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'types',
        'user_id'
    ];

    public function posts_medias_info()
    {
        return $this->hasOne(PostMediaInfo::class, 'id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
