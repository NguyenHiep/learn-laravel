<?php

namespace App\Entities;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Customer.
 *
 * @package namespace App\Entities;
 */
class Customer extends Authenticatable implements Transformable
{
    use Notifiable, TransformableTrait, HasApiTokens, SoftDeletes;

    protected $table = 'customers';

    protected $appends = ['full_name'];

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

    /***
     * send password reset notification use queue
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

}
