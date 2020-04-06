<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoleRepository.
 *
 * @package namespace App\Repositories;
 */
interface RoleRepository extends RepositoryInterface
{
    public function getListRole();

    public function getRolePermissions(int $id);
}
