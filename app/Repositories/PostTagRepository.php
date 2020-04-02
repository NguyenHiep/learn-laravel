<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostTagRepository.
 *
 * @package namespace App\Repositories;
 */
interface PostTagRepository extends RepositoryInterface
{
    public function getListTag();
}
