<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Customer;

/**
 * Class CustomerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CustomerRepositoryEloquent extends BaseRepository implements CustomerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function getListCustomer()
    {
        return $this->model::query()->select(['id', 'username', 'email', 'last_login', 'status']);
    }

    public function getCustomerInfo(int $id)
    {
        return $this->model::where('id', $id)->select(['id', 'avatar', 'first_name', 'last_name', 'username', 'email', 'last_login', 'phone', 'gender', 'birthday', 'address', 'city_id', 'district_id'])->first();
    }

    public function createCustomer(array $data)
    {
        return $this->create($data);
    }

}
