<?php

namespace App\Model;

class Medias extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_medias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','types', 'user_id'
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function posts_medias_info()
    {
        return $this->hasOne('App\Model\Medias\Mediasinfo','id','id');
    }


    public function users()
    {
        return $this->hasOne('App\Model\User','id','user_id');
    }

}
