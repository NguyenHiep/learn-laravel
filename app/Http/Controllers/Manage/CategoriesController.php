<?php

namespace App\Http\Controllers\Manage;

use App\Model\Categories;
use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Helppers\Uploads;

class CategoriesController extends BackendController
{
    public function __construct()
    {
        $this->middleware('auth');
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
            'name'              => 'required|string|unique:categories,name,' . $id,
            'slug'              => 'string|unique:categories,slug,' . $id,
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
        $data['list_cate_all'] = Categories::all();
        $data['records'] =  Categories::orderBy('id', 'asc')->paginate(20);
        return view('manage.modules.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('manage.modules.categories.index');
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
            $categories = new Categories();
            $categories->fill($inputs);
            $categories->save();
            DB::commit();
            return redirect()->route('categories.index')->with([
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
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $categories = Categories::find($id);
        if (empty($categories)) {
            return abort(404);
        }
        $inputs = $request->all();
        $validator = self::validator($inputs, $id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $image = Uploads::upload($request, 'image', UPLOAD_CATEGORY);
        if ($image) {
            $inputs[ 'image' ] = $image;
        }

        try {
            DB::beginTransaction();
            $categories->update($inputs);
            DB::commit();
            return redirect()->route('categories.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('categories.edit', ['id' => $categories->id])->withInput($inputs)->with([
            'message' => __('system.message.error', ['errors' => 'Update category is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
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
        $categories = Categories::find($id);
        if (empty($categories)) {
            return abort(404);
        }

        try {
            DB::beginTransaction();
            $categories->delete();
            DB::commit();
            return redirect()->route('categories.index')->with([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('categories.index')->with([
            'message' => __('system.message.error', ['errors' => 'Delete category is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }


}
