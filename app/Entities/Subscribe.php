<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Subscribe.
 *
 * @package namespace App\Entities;
 */
class Subscribe extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'subscribes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'ip_user',
        'status'
    ];

}
