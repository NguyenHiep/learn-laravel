<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medias extends Model
{
    use SoftDeletes;
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_medias';

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
        'name','types'
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function posts_medias_info()
    {
        return $this->hasOne('App\Model\Medias\Mediasinfo','id','id');
    }

}
