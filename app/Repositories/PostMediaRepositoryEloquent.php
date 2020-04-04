<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostMediaRepository;
use App\Entities\PostMedia;

/**
 * Class PostMediaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostMediaRepositoryEloquent extends BaseRepository implements PostMediaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostMedia::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getListPostMedia()
    {
        return $this->model::with(['posts_medias_info', 'users'])->select([
            'id',
            'name',
            'types',
            'user_id',
            'created_at'
        ]);
    }

}
