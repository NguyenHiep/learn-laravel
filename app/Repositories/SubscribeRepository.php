<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SubscribeRepository.
 *
 * @package namespace App\Repositories;
 */
interface SubscribeRepository extends RepositoryInterface
{
    public function getListSubscribe();

    public function storedSubscribe(array $inputs);
}
