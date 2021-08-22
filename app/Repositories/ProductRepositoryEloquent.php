<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductRepository as ProductRepository;
use App\Entities\Product;

/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function getListProduct()
    {
        return $this->model::query()->select([
            'id',
            'name',
            'sku',
            'price',
            'quantity',
            'status',
            'created_at'
        ]);
    }

    /****
     * Get product by category Ids
     *
     * @param array $catIds
     * @param array $condition
     * @param int $limit
     * @return mixed
     */
    public function getProductByCategoryIds(array $catIds, array $condition = [], int $limit = 0)
    {
        $count = count($catIds);
        $model = DB::table('products')->select(['id', 'name', 'pictures', 'slug', 'sale_price', 'quantity', 'category_id'])
            ->where('status', config('define.STATUS_ENABLE'))->orderBy('id', 'DESC');
        $model->addSelect(DB::raw('IF (sale_price > 0 AND sale_price < price, sale_price, price) as actual_price'));
        if ($count > 1) {
            $model->where(function ($query) use ($catIds) {
                collect($catIds)->map(function ($catId) use ($query) {
                    $query->orWhere('category_id', 'like', '%|' . $catId . '|%');
                });
            });
        } else {
            $model->where('category_id', 'like', '%|' . $catIds[0] . '|%');
        }

        if (count($condition) > 0
            && !empty($condition['column'])
            && !empty($condition['direction'])) {
            $model->orderBy($condition['column'], $condition['direction']);
            $model->orderBy('name', 'ASC');
        }
        $model->whereNull('deleted_at');

        if (count($condition) > 0
            && isset($condition['min_price'])
            && !empty($condition['max_price'])
            && is_numeric($condition['min_price'])
            && is_numeric($condition['max_price'])) {
            $newModel = DB::table( DB::raw("({$model->toSql()}) as sub") )
                ->mergeBindings($model)
                ->groupBy('sub.id');
            $newModel->whereRaw('actual_price >= ' . $condition['min_price'] . ' AND actual_price <=' . $condition['max_price']);
            if ($limit > 0) {
                return $newModel->paginate($limit);
            }
            return $newModel->get();
        }

        if ($limit > 0) {
            return $model->paginate($limit);
        }
        return $model->get();
    }

    /****
     * Get list product top trending (most viewed)
     *
     * @param int $limit
     * @return mixed
     */
    public function getListProductTrending(int $limit = 0)
    {
        $model = $this->model::select(['id', 'name', 'pictures', 'slug', 'sale_price', 'quantity', 'category_id']);
        $model->addSelect(DB::raw('IF (sale_price > 0 AND sale_price < price, sale_price, price) as actual_price'))
            ->where('status', config('define.STATUS_ENABLE'))
            ->whereNotNull('category_id')
            ->where('category_id', '!=', '')
            ->orderBy('id', 'DESC');
        if ($limit > 0) {
            $model->limit($limit);
        }
        return $model->get();
    }

    public function getProducts(array $conditions = [], int $limit = 12)
    {
        $model = $this->model::query()
            ->select(['id', 'name', 'pictures', 'slug', 'sale_price', 'quantity', 'category_id'])
            ->addSelect(DB::raw('IF (sale_price > 0 AND sale_price < price, sale_price, price) as actual_price'))
            ->whereNotNull('category_id')
            ->where('category_id', '!=', '')
            ->where('status', config('define.STATUS_ENABLE'));
        if (!empty($conditions)
            && !empty($conditions['column'])
            && !empty($conditions['direction'])) {
            $model->orderBy($conditions['column'], $conditions['direction']);
            $model->orderBy('name', 'ASC');
        }
        return $model->paginate($limit);
    }

    public function getProductBySlug($slug)
    {
        return $this->model::select([
            'id', 'name', 'slug', 'description', 'short_description', 'category_id',
            'sku', 'price', 'sale_price', 'quantity', 'meta_title', 'meta_keywords',
            'meta_description', 'galary_img', 'pictures'
        ])
            ->addSelect(DB::raw('IF (sale_price > 0 AND sale_price < price, sale_price, price) as actual_price'))
            ->where('slug', $slug)
            ->whereNotNull('category_id')
            ->where('category_id', '!=', '')
            ->where('status', config('define.STATUS_ENABLE'))
            ->first();
    }

    public function getRelatedProducts(int $id, int $limit = 4)
    {
        return $this->model::where('status', config('define.STATUS_ENABLE'))
            ->select(['id', 'name', 'slug', 'price', 'sale_price', 'pictures'])
            ->addSelect(DB::raw('IF (sale_price > 0 AND sale_price < price, sale_price, price) as actual_price'))
            ->where('id', '!=', $id)
            ->whereNotNull('category_id')
            ->where('category_id', '!=', '')
            ->where('status', config('define.STATUS_ENABLE'))
            ->limit($limit)->get();
    }

    public function getProductById(int $id)
    {
        return $this->model::where('id', $id)
            ->select(['id', 'name', 'pictures', 'slug', 'sku', 'sale_price', 'price', 'quantity', 'category_id'])
            ->addSelect(DB::raw('IF (sale_price > 0 AND sale_price < price, sale_price, price) as actual_price'))
            ->whereNotNull('category_id')
            ->where('category_id', '!=', '')
            ->where('status', config('define.STATUS_ENABLE'))->first();
    }

    public function getProductByIds(array $ids)
    {
        return $this->model::whereIn('id', $ids)
            ->select(['id', 'name', 'pictures', 'slug', 'sku', 'sale_price', 'price', 'quantity', 'category_id'])
            ->addSelect(DB::raw('IF (sale_price > 0 AND sale_price < price, sale_price, price) as actual_price'))
            ->whereNotNull('category_id')
            ->where('category_id', '!=', '')
            ->where('status', config('define.STATUS_ENABLE'))->get();
    }

    public function search(array $data, int $limit = 12)
    {
        $querySearch = $data['q'] ?? '';
        if (empty($querySearch)) {
            return [];
        }
        $queryModel = $this->model->query();
        $queryModel->select(['id', 'name', 'slug', 'price', 'sale_price', 'pictures']);
        $queryModel->addSelect(DB::raw('IF (sale_price > 0 AND sale_price < price, sale_price, price) as actual_price'));
        $queryModel->where('status', config('define.STATUS_ENABLE'))
            ->where(function ($query) use ($querySearch) {
                $query->where('sku', $querySearch)
                    ->orWhereRaw("`name` LIKE CONCAT('%', CONVERT('" . $querySearch . "', BINARY), '%')")
                    ->orWhere('name', 'like', '%' . $querySearch . '%');
            });
        // Filter by price
       /* $price_from = 0;
        if (!empty($options['price_from'])) {
            $price_from = intval($options['price_from']);
        }
        $price_to = 0;
        if (!empty($options['price_to'])) {
            $price_to = intval($options['price_to']);
        }
        if (!empty($price_to)) {
            $queryModel->whereBetween('price', [$price_from, $price_to]);
        }
        // Filter stock
        $status = $options['status'] ?? '';
        if (!empty($status) && is_array($status)) {
            $queryModel->where(function ($query) use($status){
                if (in_array('in_stock', $status)) {
                    $query->orWhere('quantity', '>', 0);
                }
                if (in_array('out_stock', $status)) {
                    $query->orWhere('quantity', 0);
                }
            });

        }*/
        return $queryModel->orderBy('name')->paginate($limit);
    }

}
