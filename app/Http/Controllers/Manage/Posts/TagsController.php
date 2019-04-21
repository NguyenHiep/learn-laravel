<?php

namespace App\Http\Controllers\Manage\Posts;

use App\Model\Posts\Tags;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TagsController extends BackendController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Validate tags field
     * @param $data
     * @param null $id
     * @return mixed
     */
    protected static function validator($data, $id = null)
    {
        return Validator::make($data, [
            'name'              => 'required|string|unique:posts_tags,name,' . $id,
            'slug'              => 'string|unique:posts_tags,slug,' . $id,
            'description'       => 'nullable|string',
            'status'            => 'required|min:1|max:2'
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Tags::orderBy('id', 'asc')->paginate(20);
        return view('manage.modules.posts.tags.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('manage.modules.posts.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $inputs    = $request->all();
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        try {
            DB::beginTransaction();
            $tags = new Tags();
            $tags->fill($inputs);
            $tags->save();
            DB::commit();
            return redirect()->route('tags.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create tags post is failed']),
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
        $record =  Tags::findOrFail($id);
        return view('manage.modules.posts.tags.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $tags      = Tags::findOrFail($id);
        $inputs    = $request->all();
        $validator = self::validator($inputs, $id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        DB::beginTransaction();
        $tags->update($inputs);
        DB::commit();
    
        return redirect()->route('tags.index')->with([
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
        $tags = Tags::findOrFail($id);
        try {
            DB::beginTransaction();
            $tags->delete();
            DB::commit();
            return redirect()->route('tags.index')->with([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('tags.index')->with([
            'message' => __('system.message.error', ['errors' => 'Delete post tags is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }


}
