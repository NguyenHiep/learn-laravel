<?php

namespace App\Entities;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Models\Permission As BaseRole;

/**
 * Class Permission.
 *
 * @package namespace App\Entities;
 */
class Permission extends BaseRole implements Transformable
{
    use TransformableTrait;

    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

}
