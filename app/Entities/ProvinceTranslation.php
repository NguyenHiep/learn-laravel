<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProvinceTranslation.
 *
 * @package namespace App\Entities;
 */
class ProvinceTranslation extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'province_translations';

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
