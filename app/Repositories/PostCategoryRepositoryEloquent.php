<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\PostCategory;

/**
 * Class PostCategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostCategoryRepositoryEloquent extends BaseRepository implements PostCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostCategory::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function getListCategory()
    {
        return $this->model::query()->select(['id', 'name', 'status']);
    }

}
