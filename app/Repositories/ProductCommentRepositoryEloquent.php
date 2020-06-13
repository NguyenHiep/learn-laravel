<?php

namespace App\Repositories;

use DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductCommentRepository as ProductCommentRepository;
use App\Entities\ProductComment;

/**
 * Class ProductCommentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductCommentRepositoryEloquent extends BaseRepository implements ProductCommentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductComment::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getListComment()
    {
        return $this->model::select([
            'id',
            'name',
            'content',
            'rate',
            'ip_user',
            'status',
            'product_id',
            'customer_id',
            'created_at'
        ]);
    }

    public function getCommentByUser(int $customerId, int $limit = 15)
    {
        return DB::table('product_comments AS pc')
            ->select(['pc.id', 'pc.rate', 'pc.created_at', 'p.name AS product_name', 'p.slug', 'p.pictures'])
            ->join('products AS p', 'p.id', '=', 'pc.product_id')
            ->join('customers AS c', 'c.id', '=', 'pc.customer_id')
            ->where('c.id', $customerId)
            ->whereNotNull('p.category_id')
            ->where('p.category_id', '!=', '')
            ->where('p.status', config('define.STATUS_ENABLE'))
            ->whereNull('pc.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('p.deleted_at')
            ->orderByDesc('pc.created_at')
            ->paginate($limit);
    }

}
