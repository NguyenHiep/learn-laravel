<?php

namespace App\Entities;

use App\Entities\BaseModel as BaseModel;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Location.
 *
 * @package namespace App\Entities;
 */
class Location extends BaseModel implements Transformable
{
    use TransformableTrait;

    protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'slug',
        'is_active',
        'loc_lat',
        'loc_long',
        'price',
        'code',
        'delivery',
        'country'
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
        return $this->hasMany(LocationTranslation::class, 'location_id', 'id');
    }
}
