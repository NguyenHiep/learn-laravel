<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace App\Repositories;
 */
interface PostRepository extends RepositoryInterface
{
    public function getListPost();

    public function getListPostNew(int $limit = 12);

    public function getPostBySlug($slug);

    public function getRelatedPost(array $postIds);

    public function getCommentByPostId(int $postId);

}
