<?php

namespace App\Repositories;

use App\Entities\Subscribe;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SubscribeRepository;

/**
 * Class SubscribeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SubscribeRepositoryEloquent extends BaseRepository implements SubscribeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Subscribe::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getListSubscribe()
    {
        return $this->model::select(['id', 'email', 'ip_user', 'created_at', 'status']);
    }

    public function storedSubscribe(array $inputs)
    {
        return $this->model->firstOrCreate([
            'email'   => $inputs['email'],
            'ip_user' => $inputs['ip_user']
        ]);
    }

}
