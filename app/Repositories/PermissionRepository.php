<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PermissionRepository.
 *
 * @package namespace App\Repositories;
 */
interface PermissionRepository extends RepositoryInterface
{
    public function getListPermission();

    public function getDetailRolePermission(int $roleId);
}
