<?php

namespace App\Http\Controllers\Manage;

use App\Model\ProductAttributes;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use App\Model\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Helppers\Uploads;
use Yajra\DataTables\DataTables;

class ProductsController extends BackendController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
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
            'slug'                  => 'string|unique:products,slug,' . $id,
            'description'           => 'required|string',
            'short_description'     => 'string',
            'category_id'           => 'string',
            'sku'                   => 'required|string|unique:products,sku,' . $id,
            'price'                 => 'required|numeric|min:0',
            'sale_price'            => 'numeric|min:0',
            'quantity'              => 'required|integer|min:0',
            'status'                => 'string|numeric',
            'meta_title'            => 'string|max:100',
            'meta_keywords'         => 'string|max:1000',
            'meta_description'      => 'string|max:255',
            'brand_id'              => 'string',
            'gallery_img'           => 'array',
            'pictures'              => 'image|max:1024',
            'attributes'            => 'array',
            'attributes.*.size'     => 'nullable|string',
            'attributes.*.sku'      => 'nullable|string',
            'attributes.*.price'    => 'integer|min:0',
            'attributes.*.quantity' => 'integer|min:0'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Products::select(['id', 'name', 'sku', 'price', 'quantity', 'status', 'created_at']);
            return Datatables::of($products)
                ->editColumn('status', function ($product) {
                    $statusClass = $product->status === config('define.STATUS_ENABLE') ? 'label-success' : 'label-danger';
                    $showText = __('selector.post_status.' . $product->status);
                    return '<span class="label label-sm ' . $statusClass . ' margin-right-10"> ' . $showText . '</span>';
                })
                ->addColumn('action', function ($product) {
                    $html = '<div class="btn-group btn-group-solid">';
                    $html .= ' <a title="' . __('common.buttons.edit') . '" href=" ' . route('products.edit',
                            $product->id) . '" class="btn  btn-warning js-action-list-rowlink-val"><i class="fa fa-edit"></i></a>';
                    $html .= ' <a title="' . __('common.buttons.delete') . '" href=" ' . route('products.destroy',
                            $product->id) . '" data-method="delete" class="btn btn-default btn-delete js-action-delete-record"><i class="fa fa-trash-o"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('manage.modules.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
            return redirect()->route('products.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
            return redirect()->route('products.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('products.edit', ['id' => $product->id])->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => __('Update product is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        try {
            DB::beginTransaction();
            $product->delete();
            DB::commit();
            return redirect()->route('products.index')->with([
                'message' => 'Delete product is successfully',
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('products.index')->with([
            'message' => __('system.message.errors', ['errors' => 'Delete product is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

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
            return response()->json([
                'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

    }
}
