<?php

namespace App\Http\Controllers\Manage;

use App\Model\ProductAttributes;
use App\Model\Products;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use App\Model\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Uploads;
use App\DataTables\ProductsDataTable;

class ProductsController extends BackendController
{

    /**
     * The product repository implementation.
     *
     * @var ProductRepository
     */
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->middleware('permission:product-list', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->repository = $repository;
    }

    /**
     * Validate product field
     * @param $data
     * @param null $id
     * @return mixed
     */
    protected static function validator($data, $id = null)
    {
        return Validator::make($data, [
            'name'                  => 'required|string|unique:products,name,' . $id,
            'slug'                  => 'required|string|unique:products,slug,' . $id,
            'description'           => 'required|string',
            'short_description'     => 'nullable|string',
            'category_id'           => 'nullable|string',
            'sku'                   => 'required|string|unique:products,sku,' . $id,
            'price'                 => 'required|numeric|min:0',
            'sale_price'            => 'nullable|numeric|min:0',
            'quantity'              => 'required|integer|min:0',
            'status'                => 'required|string|numeric',
            'meta_title'            => 'nullable|string|max:100',
            'meta_keywords'         => 'nullable|string|max:1000',
            'meta_description'      => 'nullable|string|max:255',
            'brand_id'              => 'nullable|string',
            'gallery_img'           => 'nullable|array',
            'pictures'              => 'nullable|image|max:1024',
            'attributes'            => 'nullable|array',
            'attributes.*.size'     => 'nullable|string',
            'attributes.*.sku'      => 'nullable|string',
            'attributes.*.price'    => 'nullable|integer|min:0',
            'attributes.*.quantity' => 'nullable|integer|min:0'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        if (request()->ajax()) {
            $products = $this->repository->getListProduct();
            $dataTables = new ProductsDataTable($products);
            return $dataTables->getTransformerData();
        }

        $fields = [
            'id' => [
                'label' => __('common.products.id'),
            ],
            'name' => [
                'label' => __('common.products.name'),
            ],
            'sku' => [
                'label' => __('common.products.sku'),
            ],
            'price' => [
                'label' => __('common.products.price'),
            ],
            'quantity' => [
                'label' => __('common.products.quantity'),
            ],
            'status' => [
                'label' => __('common.products.status'),
            ],
            'created_at' => [
                'label' => __('common.products.created_at'),
            ],
            'actions' => [
                'label'      => __('common.products.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = ProductsDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.products.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $list_cate_all = Categories::all();
        $record = new \stdClass();
        $listGallery = array_fill(0, 5, '');
        $record->galary_img = $listGallery;
        return view('manage.modules.products.create', compact('list_cate_all', 'record'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        if (isset($inputs['category_id'])) {
            $inputs['category_id'] = convert_to_string($inputs['category_id']);
        } else {
            $inputs['category_id'] = '';
        }
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $gallery_upload = Uploads::multiple_upload($request, 'gallery_img', UPLOAD_PRODUCT);
        if ($gallery_upload) {
            $inputs['galary_img'] = $gallery_upload;
        }
        $pictures = Uploads::upload($request, 'pictures', UPLOAD_PRODUCT);
        if ($pictures) {
            $inputs['pictures'] = $pictures;
        }
        if (isset($inputs['slug'])) {
            $inputs['slug'] = unicode_str_filter($inputs['slug']);
        } else {
            $inputs['slug'] = unicode_str_filter($inputs['name']);
        }
        try {
            DB::beginTransaction();
            $product = new Products();
            $product->fill($inputs);
            $product->save();
            if (!empty($inputs['attributes'][0]['size'])) {
                $product->productAttributes()->createMany($inputs['attributes']);
            }
            DB::commit();
            return redirect()->route('manage.products.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error( __METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create product is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $list_cate_all = Categories::all();
        $record = Products::with('productAttributes')->findOrFail($id);
        $listGallery = array_fill(0, 5, '');
        if (!empty($record->galary_img)) {
            for ($i = 0; $i < 5; $i++) {
                $listGallery[$i] = $record->galary_img[$i] ?? '';
            }
            $record->galary_img = $listGallery;
        } else {
            $record->galary_img = $listGallery;
        }
        return view('manage.modules.products.edit')->with([
            'list_cate_all' => $list_cate_all,
            'record'        => $record
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $inputs = $request->all();
        if (isset($inputs['category_id'])) {
            $inputs['category_id'] = convert_to_string($inputs['category_id']);
        } else {
            $inputs['category_id'] = '';
        }
        $validator = self::validator($inputs, $id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $pictures = Uploads::upload($request, 'pictures', UPLOAD_PRODUCT);
        if ($pictures) {
            $inputs['pictures'] = $pictures;
        }
        $gallery_upload = Uploads::multiple_upload($request, 'gallery_img', UPLOAD_PRODUCT);
        if ($gallery_upload) {
            $inputs['galary_img'] = $gallery_upload;
        }
        if (isset($inputs['slug'])) {
            $inputs['slug'] = unicode_str_filter($inputs['slug']);
        } else {
            $inputs['slug'] = unicode_str_filter($inputs['name']);
        }

        try {
            DB::beginTransaction();
            $product->update($inputs);
            if (!empty($inputs['attributes'][0]['size'])) {
                foreach ($inputs['attributes'] as $attribute) {
                    $product->productAttributes()->updateOrCreate([
                        'product_id' => $id,
                        'size'       => $attribute['size'],
                        'sku'        => $attribute['sku'],
                    ], $attribute);
                }
            }
            DB::commit();
            return redirect()->route('manage.products.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->route('manage.products.edit', ['id' => $product->id])->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => __('Update product is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        try {
            DB::beginTransaction();
            $product->delete();
            DB::commit();
            return response()->json([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
            return response()->json([
                'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

    }

    /****
     * Delete item attribute of product
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteAttribute(Request $request)
    {
        $id = $request->input('id', 0);
        if ($id < 0) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }
        $productAttribute = ProductAttributes::find($id);
        if (empty($productAttribute)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            DB::beginTransaction();
            $productAttribute->forceDelete();
            DB::commit();
            return response()->json([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
            return response()->json([
                'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

    }
}
