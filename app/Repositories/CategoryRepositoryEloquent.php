<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Category;

/**
 * Class CategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
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

    public function getListCategoryMenu(array $catIds = [])
    {
        $model = $this->model::select(['id', 'name', 'slug', 'image', 'description'])
        ->where('status', config('define.STATUS_ENABLE'));
        if (count($catIds) > 0) {
            $model->whereIn('id', $catIds);
        }
        return $model->get();
    }

    public function getCategoryBySlug($slug)
    {
        return $this->model::select(['id', 'name', 'slug', 'image', 'description'])
            ->where('slug', $slug)
            ->where('status', config('define.STATUS_ENABLE'))
            ->first();
    }

}
