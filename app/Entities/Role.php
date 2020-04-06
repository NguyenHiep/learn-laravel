<?php

namespace App\Entities;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Models\Role As BaseRole;

/**
 * Class Role.
 *
 * @package namespace App\Entities;
 */
class Role extends BaseRole implements Transformable
{
    use TransformableTrait;

    protected $guard_name = 'admin';

    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'guard_name'
    ];

}
