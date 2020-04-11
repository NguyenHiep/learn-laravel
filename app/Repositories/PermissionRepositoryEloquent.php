<?php

namespace App\Repositories;

use App\Entities\Permission;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PermissionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{

    protected $guard_name = 'user';

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function getListPermission()
    {
        return $this->model::select(['id', 'name', 'created_at', 'updated_at'])->where('guard_name', $this->guard_name)->get();
    }

    public function getDetailRolePermission(int $roleId)
    {
        return $this->model::join('role_has_permissions AS rhp', 'rhp.permission_id', '=', 'permissions.id')->where('rhp.role_id', $roleId)->get();
    }

}
