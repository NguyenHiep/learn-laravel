<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderRepository.
 *
 * @package namespace App\Repositories;
 */
interface OrderRepository extends RepositoryInterface
{
    public function getListOrder();

    public function getLatestOrder(int $limit = 10);

    public function getTotalPrice();

    public function getOrderCustomer(int $customerId, int $limit = 15);

    public function getOrderDetail(int $id);
}
