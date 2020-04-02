<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Comment.
 *
 * @package namespace App\Entities;
 */
class Page extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_title',
        'page_slug',
        'page_intro',
        'page_full',
        'page_medias_id',
        'page_status',
        'page_attribute',
        'page_keyword',
        'visit',
        'user_id'
    ];


    public function media()
    {
        return $this->hasOne('App\Entities\PostMedia', 'id', 'page_medias_id');
    }

    public function author()
    {
        return $this->hasOne('App\Model\User', 'id', 'user_id');
    }
}
