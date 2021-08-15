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

    public function getListPostNew(int $limit = 12)
    {
        return $this->model::with(['media'])
            ->select(['id', 'post_title', 'post_slug', 'post_intro', 'post_keyword', 'posts_medias_id', 'visit', 'created_at', 'updated_at'])
            ->where('post_status', config('define.STATUS_ENABLE'))
            ->orderBy('id', 'DESC')
            ->paginate($limit);
    }

    /****
     * @param $slug
     * @return mixed
     */
    public function getPostBySlug($slug)
    {
        return $this->model::with(['media:id,name'])
            ->select(['id', 'post_title', 'post_slug', 'post_intro', 'post_full', 'post_keyword', 'posts_medias_id', 'visit', 'created_at', 'updated_at'])
            ->where('post_slug', $slug)
            ->where('post_status', config('define.STATUS_ENABLE'))
            ->first();
    }

    /****
     * @param array $postIds
     * @return mixed
     */
    public function getRelatedPost(array $postIds)
    {
        return $this->model::with(['media:id,name'])
            ->select(['id', 'post_title', 'post_slug', 'post_intro', 'post_full', 'post_keyword', 'posts_medias_id', 'visit', 'created_at', 'updated_at'])
            ->where('post_status', config('define.STATUS_ENABLE'))
            ->whereIn('id', $postIds)
            ->get();
    }

    /****
     * @param int $postId
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCommentByPostId(int $postId, int $limit = 3)
    {
        return $this->model::with([
            'comment' => function ($query) {
                $query->where('comment_status', config('define.STATUS_ENABLE'));
            }
        ])->paginate($limit);
    }

}
