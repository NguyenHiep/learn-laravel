<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LocationTranslation.
 *
 * @package namespace App\Entities;
 */
class LocationTranslation extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'location_translations';

    protected $dates = [];

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'body'
    ];

}
