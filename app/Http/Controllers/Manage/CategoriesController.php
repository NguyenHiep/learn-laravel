<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\CategoriesDataTable;
use App\Model\Categories;
use App\Http\Controllers\BackendController;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Upload;

class CategoriesController extends BackendController
{
    /**
     * The category repository implementation.
     *
     * @var CategoryRepository
     */
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->middleware('permission:category-list', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->repository = $repository;
    }

    /**
     * Validate category field
     * @param $data
     * @param null $id
     * @return mixed
     */
    protected static function validator($data, $id = null)
    {

        return Validator::make($data, [
            'name'        => 'required|string|unique:categories,name,' . $id,
            'slug'        => 'string|unique:categories,slug,' . $id,
            'parent_id'   => 'numeric|min:0',
            'image'       => 'image|max:1024',
            'description' => 'required|string',
            'status'      => 'required|min:1|max:2',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $category = $this->repository->getListCategory();
            $dataTables = new CategoriesDataTable($category);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id'      => [
                'label' => __('common.categories.id')
            ],
            'name'    => [
                'label' => __('common.categories.name')
            ],
            'status'  => [
                'label' => __('common.categories.status')
            ],
            'actions' => [
                'label'      => __('common.categories.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = CategoriesDataTable::getColumns($fields);
        $withData = [
            'fields'        => $fields,
            'columns'       => $dtColumns,
            'list_cate_all' => $this->repository->all(['id', 'name', 'parent_id'])
        ];
        return view('manage.modules.categories.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('manage.modules.categories.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $slug = unicode_str_filter($inputs['name']);
        if (!empty($inputs['slug'])) {
            $slug = unicode_str_filter($inputs['slug']);
        }
        $inputs['slug'] = $slug;
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $image = Upload::singleFile( 'image', config('define.UPLOAD_CATEGORY'));
        if ($image) {
            $inputs['image'] = $image;
        }

        try {
            DB::beginTransaction();
            $categories = new Categories();
            $categories->fill($inputs);
            $categories->save();
            DB::commit();
            return redirect()->route('manage.categories.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create category is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
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
        $data['list_cate_all'] = Categories::all();
        $record = Categories::find($id);
        if (empty($record)) {
            return abort(404);
        }
        $data['record'] = $record;

        return view('manage.modules.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $categories = Categories::find($id);
        if (empty($categories)) {
            return abort(404);
        }
        $inputs = $request->all();
        $slug = unicode_str_filter($inputs['name']);
        if (!empty($inputs['slug'])) {
            $slug = unicode_str_filter($inputs['slug']);
        }
        $inputs['slug'] = $slug;
        $validator = self::validator($inputs, $id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $image = Upload::singleFile( 'image', config('define.UPLOAD_CATEGORY'));
        if ($image) {
            $inputs['image'] = $image;
        }

        try {
            DB::beginTransaction();
            $categories->update($inputs);
            DB::commit();
            return redirect()->route('manage.categories.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->route('manage.categories.edit', ['id' => $categories->id])->withInput($inputs)->with([
            'message' => __('system.message.error', ['errors' => 'Update category is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        if (empty($categories)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            \DB::beginTransaction();
            $categories->delete();
            \DB::commit();
            return response()->json([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error([$e->getMessage(), __METHOD__]);
        }
        return response()->json([
            'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }


}
