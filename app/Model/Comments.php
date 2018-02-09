<?php

namespace App\Model;

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
        'comment_status',
        'ip_user',
        'posts_id',
        'comment_parent'
    ];
}
