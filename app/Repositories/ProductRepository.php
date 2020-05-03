<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository.
 *
 * @package namespace App\Repositories;
 */
interface ProductRepository extends RepositoryInterface
{
    public function getListProduct();

    public function getProductByCategoryIds(array $catIds, int $limit = 0);

    public function getListProductTrending(int $limit = 0);

    public function getProducts(array $conditions = [], int $limit = 20);

    public function getProductBySlug($slug);

    public function getRelatedProducts(int $id, int $limit = 4);

    public function getProductById(int $id);
}
