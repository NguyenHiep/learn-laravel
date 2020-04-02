<?php

namespace App\Http\Controllers\Manage\Posts;

use App\DataTables\PostCategoriesDataTable;
use App\Model\Posts\Category;

use App\Http\Controllers\BackendController;
use App\Repositories\PostCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Helppers\Uploads;

class CategoryController extends BackendController
{
    /**
     * The post category repository implementation.
     *
     * @var PostCategoryRepository
     */
    protected $repository;

    public function __construct(PostCategoryRepository $repository)
    {
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
            'name'              => 'required|string|unique:posts_category,name,' . $id,
            'slug'              => 'string|unique:posts_category,slug,' . $id,
            'parent_id'         => 'numeric|min:0',
            'image'             => 'image|max:1024',
            'description'       => 'required|string',
            'status'            => 'required|min:1|max:2',
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
            $postCategories = $this->repository->getListCategory();
            $dataTables = new PostCategoriesDataTable($postCategories);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id' => [
                'label' => __('common.categories.id')
            ],
            'name' => [
                'label' => __('common.categories.name')
            ],
            'status' => [
                'label' => __('common.categories.status')
            ],
            'actions' => [
                'label'      => __('common.categories.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = PostCategoriesDataTable::getColumns($fields);
        $withData = [
            'fields'        => $fields,
            'columns'       => $dtColumns,
            'list_cate_all' => $this->repository->all(['id', 'name', 'parent_id'])
        ];
        return view('manage.modules.posts.category.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.modules.posts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = self::validator($inputs);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $image = Uploads::upload($request, 'image', UPLOAD_CATEGORY);
        if ($image) {
            $inputs[ 'image' ] = $image;
        }

        try {
            DB::beginTransaction();
            $category = new Category();
            $category->fill($inputs);
            $category->save();
            DB::commit();
            return redirect()->route('category.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create category post is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $list_cate_all = Category::all();
        $record = Category::findOrFail($id);
        return view('manage.modules.posts.category.edit', compact('record', 'list_cate_all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //Get data info
        $category  = Category::findOrFail($id);
        $inputs    = $request->all();
        $validator = self::validator($inputs, $id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $image = Uploads::upload($request, 'image', UPLOAD_CATEGORY);
        if ($image) {
            $inputs['image'] = $image;
        }
        
        DB::beginTransaction();
        $category->update($inputs);
        DB::commit();

        return redirect()->route('category.index')->with([
            'message' => __('system.message.update'),
            'status'  => self::CTRL_MESSAGE_SUCCESS,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (empty($category)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            \DB::beginTransaction();
            $category->delete();
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
