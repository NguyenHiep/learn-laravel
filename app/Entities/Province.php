<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Province.
 *
 * @package namespace App\Entities;
 */
class Province extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'provinces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'slug',
        'is_active',
        'price',
        'code',
        'delivery',
        'location_id',
        'price_contact'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function translations()
    {
        return $this->hasMany(ProvinceTranslation::class, 'province_id', 'id');
    }

}
