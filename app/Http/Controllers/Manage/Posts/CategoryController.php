<?php

namespace App\Http\Controllers\Manage\Posts;

use App\Model\Posts\Category;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_cate_all = Category::all();

        $records = Category::orderBy('id', 'asc')->paginate(12);

        //
//        $posts_category = Category::with('children')
//                            ->where('parent_id', '=', 0)
//                            ->orderBy('id', 'asc')
//                            ->get();


        return view('manage.modules.posts.category.index', compact('records', 'list_cate_all'));
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
        // Begin validate
        $this->validate(request(),
            ['name' => 'required'],
            ['name.required' => 'Vui lòng nhập tên chuyên mục']
        );

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
            'message' => __('system.message.errors', ['errors' => 'Create category is failed']),
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
        if (empty($record)) {
            return abort(404);
        }
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
        $record = Category::findOrFail($id);
        if (empty($record)) {
            return abort(404);
        }
        // Begin validate
        $this->validate(request(),
            ['name' => 'required',],
            ['name.required' => 'Vui lòng nhập tên chuyên mục']
        );
        $inputs = $request->all();
        DB::beginTransaction();
        $record->update($inputs);
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
            return abort(404);
        }

        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            return redirect()->route('category.index')->with([
                'message' => 'Delete category is success',
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('category.index')->with([
            'message' => __('system.message.error', ['errors' => 'Delete category is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

}
