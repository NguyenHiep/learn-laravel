<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Customer.
 *
 * @package namespace App\Entities;
 */
class Customer extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'customers';

    protected $appends = ['full_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'avatar',
        'first_name',
        'last_name',
        'username',
        'password',
        'email',
        'last_login',
        'phone',
        'gender',
        'birthday',
        'address',
        'city_id',
        'district_id',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

}
