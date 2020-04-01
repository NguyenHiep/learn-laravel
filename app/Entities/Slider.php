<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Slider.
 *
 * @package namespace App\Entities;
 */
class Slider extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'sliders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slider_img',
        'slider_title',
        'slider_content',
        'slider_url',
        'slider_target',
        'slider_status',
        'user_id'
    ];

}
