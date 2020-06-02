<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LocationRepository.
 *
 * @package namespace App\Repositories;
 */
interface LocationRepository extends RepositoryInterface
{
    public function getListLocation();

}
