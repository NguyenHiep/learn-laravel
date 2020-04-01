<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SliderRepository;
use App\Entities\Slider;

/**
 * Class SliderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SliderRepositoryEloquent extends BaseRepository implements SliderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Slider::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getListSlider()
    {
        return $this->model::select(['id', 'slider_img', 'slider_title', 'slider_content', 'slider_status']);
    }

}
