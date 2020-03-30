<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostRepository;
use App\Entities\Post;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getListPost()
    {
        return $this->model::with([
            'posts_categories' => function ($query) {
                $query->select('name');
            },
            'posts_tags'       => function ($query) {
                $query->select('name');
            },
            'author',
            'media'
        ])->select(['id', 'post_title', 'posts_medias_id', 'post_status', 'visit', 'updated_at']);
    }

}
