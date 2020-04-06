<?php

namespace App\Repositories;

use App\Entities\Role;
use DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{

    public $guard_name = 'admin';

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function getListRole()
    {
        return $this->model::query()->select(['id', 'name', 'created_at', 'updated_at'])->where('guard_name', $this->guard_name);
    }

    public function getRolePermissions(int $id)
    {
        return DB::table('role_has_permissions AS rhp')->where('rhp.role_id', $id)
            ->pluck('rhp.permission_id', 'rhp.permission_id')
            ->all();
    }

}
