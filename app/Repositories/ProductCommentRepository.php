<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductCommentRepository.
 *
 * @package namespace App\Repositories;
 */
interface ProductCommentRepository extends RepositoryInterface
{
    public function getListComment();

    public function getCommentByUser(int $customerId, int $limit = 15);

    public function getCommentByProduct(int $productId, int $limit = 5);
}
