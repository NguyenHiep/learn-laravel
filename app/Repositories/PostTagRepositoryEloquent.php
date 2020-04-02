<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\PostTags;

/**
 * Class PostTagRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostTagRepositoryEloquent extends BaseRepository implements PostTagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostTags::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function getListTag()
    {
        return $this->model::query()->select(['id', 'name', 'status']);
    }

}
