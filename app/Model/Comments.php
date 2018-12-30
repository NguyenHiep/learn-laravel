<?php

namespace App\Model;

use Carbon\Carbon;

class Comments extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'content',
        'url',
        'rate',
        'comment_status',
        'ip_user',
        'posts_id',
        'comment_parent'
    ];
    
    /***
     * Get create at format date
     * @param $value
     *
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i');
    }
    
    public function post()
    {
        return $this->hasOne('App\Model\Posts','posts_id');
    }
}
