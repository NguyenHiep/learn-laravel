<?php

namespace App\Model\Medias;

use App\Model\BaseModel;
use App\Model\Medias;

class Mediasinfo extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_medias_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','extension','width','height','size','title','caption',
        'alt','description','lightbox','video_length','video_type',
        'video_code_id'
    ];

    public function posts_medias()
    {
        return $this->hasOne(Medias::class,'id','id');
    }
}
