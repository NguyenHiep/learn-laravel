<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Order;

/**
 * Class OrderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function getListOrder()
    {
        return $this->model::with('deliveries')->select(['id', 'ordered_at', 'total', 'status']);
    }

    public function getLatestOrder(int $limit = 10)
    {
        return $this->model::with('deliveries')->latest('id')->limit($limit)->get();
    }

    public function getTotalPrice()
    {
        return $this->model::selectRaw('SUM(`total`) AS `total_sales`, COUNT(`id`) AS `total_order`')->first();
    }

    public function getOrderCustomer(int $customerId, int $limit = 15)
    {
        $model = $this->model::join('customers AS c', 'c.id', '=', 'orders.customer_id')
            ->select(['orders.id', 'orders.ordered_at', 'orders.status', 'orders.total'])
            ->where('c.id', $customerId)
            ->orderBy('orders.id', 'DESC');
        if ($limit > 0) {
            $model->limit($limit);
        } else {
            return $model->paginate(20);
        }
        return $model->get();
    }

    public function getOrderDetail(int $id)
    {
        return $this->model::with(['products','deliveries'])->where('id', $id)->first();
    }

}
