<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProvinceRepository.
 *
 * @package namespace App\Repositories;
 */
interface ProvinceRepository extends RepositoryInterface
{
    public function getListProvince();

    public function getListProvinceByLocationId(int $locationId);

}
