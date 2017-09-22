<?php

namespace App\Http\Controllers\Manage\Posts;

use App\Model\Posts\Category;

use App\Http\Controllers\Controller;

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
        $list_cate = [0 => 'Không'];
        foreach ($list_cate_all as $item) {
            $list_cate[$item->id] = $item->name;
        }

        $records = Category::orderBy('id', 'desc')->paginate(20);

        return view('manage.modules.posts.category.index', compact('records', 'list_cate'));
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
    public function store()
    {
        // Begin validate
        $this->validate(request(),
            ['name'   => 'required',],
            ['name.required' => 'Vui lòng nhập tên chuyên mục']
        );
        // Begin create category
        $category = new Category();
        $category->name         = request()->name;
        $category->slug         = request()->slug;
        $category->parent_id    = request()->parent_id;
        $category->description  = request()->description;
        $category->save();
        session()->flash('message', __('system.message.create'));
        return redirect()->route('category.index');
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


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }


}
