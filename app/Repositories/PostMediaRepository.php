<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostMediaRepository.
 *
 * @package namespace App\Repositories;
 */
interface PostMediaRepository extends RepositoryInterface
{
    public function getListPostMedia();
}
