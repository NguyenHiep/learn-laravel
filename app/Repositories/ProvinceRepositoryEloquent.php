<?php

namespace App\Repositories;

use DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Province;

/**
 * Class ProvinceRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProvinceRepositoryEloquent extends BaseRepository implements ProvinceRepository
{
    const STATUS_ACTIVE = 1;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Province::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getListProvince()
    {
        // TODO: Implement getListProvince() method.
    }

    public function getListProvinceByLocationId(int $locationId)
    {
        return DB::table('provinces AS p')
            ->join('province_translations AS pt', function ($query) {
                $query->on('p.id', 'pt.province_id');
                $query->where('pt.locale', $this->app->getLocale());
            })->select(['p.id', 'p.code', 'pt.name'])
            ->where('p.location_id', $locationId)
            ->where('p.is_active', self::STATUS_ACTIVE)
            ->get();
    }
}
