<?php

namespace App\Repositories;

use DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Location;

/**
 * Class LocationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LocationRepositoryEloquent extends BaseRepository implements LocationRepository
{
    const STATUS_ACTIVE = 1;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Location::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getListLocation()
    {
        return DB::table('locations AS l')
            ->join('location_translations AS lt', function ($query) {
                $query->on('l.id', 'lt.location_id');
                $query->where('lt.locale', $this->app->getLocale());
            })->select(['l.id', 'l.code', 'lt.name'])
            ->where('l.is_active', self::STATUS_ACTIVE)
            ->get();
    }
}
