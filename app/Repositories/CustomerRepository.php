<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CustomerRepository.
 *
 * @package namespace App\Repositories;
 */
interface CustomerRepository extends RepositoryInterface
{
    public function getListCustomer();

    public function getCustomerInfo(int $id);
}
