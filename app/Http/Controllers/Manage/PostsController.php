<?php

namespace App\Http\Controllers\Manage;

use App\Model\Posts;
use App\Model\Posts\Category;
use App\Model\Posts\Tags;
use App\Http\Controllers\BackendController;
use Carbon\Carbon;
use DB;
use Log;
use Mockery\Exception;
use Illuminate\Support\Facades\Validator;

class PostsController extends BackendController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
    
    /***
     * Validator in the post
     * @param array    $data
     * @param int|null $id
     *
     * @return \Illuminate\Validation\Validator
     */
    protected static function validator(array $data, int $id = null)
    {
        return Validator::make($data, [
            'post_title' => 'required|string|unique:posts,post_title,' . $id,
            'post_slug'  => 'required|string|unique:posts,post_slug,' . $id,
            'post_full'  => 'required|string'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Posts::with([
            'posts_categories' => function ($query) {
                $query->select('name');
            },
            'posts_tags'       => function ($query) {
                $query->select('name');
            },
            'author',
            'media'
        ])->paginate(20);
        return view('manage.modules.posts.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignData = [
            'list_cate_all' => Category::all(),
            'list_tags_all' => Tags::all(),
            'medias'        => $this->medias
        ];
        return view('manage.modules.posts.create')->with($assignData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $inputs    = request()->all();
        $post_slug = unicode_str_filter($inputs['post_title']);
        if (!empty($inputs['post_slug'])) {
            $post_slug = unicode_str_filter($inputs['post_slug']);
        }
        $inputs['post_slug'] = $post_slug;
        $inputs['user_id']   = auth()->user()->id;
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        try {
            DB::beginTransaction();
            $post = new Posts();
            $post->fill($inputs);
            $post->save();
            if (isset($inputs['post_category']) && !empty($post->id)) {
                $post_category = Category::find($inputs['post_category']);
                $post->posts_categories()->attach($post_category);
            }
            // Create tags
            if (isset($inputs['posts_tags']) && !empty($post->id)) {
                $list_tags      = explode(',', $inputs['posts_tags']);
                $posts_tags_ids = [];
                foreach ($list_tags as $tags) {
                    if(!empty($tags)){
                        $post_tag = Tags::firstOrCreate([
                            'name' => $tags,
                            'slug' => unicode_str_filter($tags)
                        ]);
                        $posts_tags_ids[] = $post_tag['id'];
                    }
                }
                $post->posts_tags()->attach($posts_tags_ids);
            }
            DB::commit();
            return redirect()->route('posts.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->with([
            'message' => __('system.message.errors', ['errors' => 'Create post failed!']),
            'status'  => self::CTRL_MESSAGE_ERROR
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
        $record       = Posts::with('posts_categories', 'posts_tags', 'media')->findOrFail($id);
        $record->cats = collect($record->posts_categories)->pluck('id')->toArray();
        $tags         = collect($record->posts_tags)->pluck('name')->toArray();
        $record->tags = implode(',', $tags);
        $record->post_featured = $record->media->name ?? null;
        $assignData = [
            'list_cate_all' => Category::all(),
            'list_tags_all' => Tags::all(),
            'medias'        => $this->medias,
            'record'        => $record,
        ];
        return view('manage.modules.posts.edit')->with($assignData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $inputs    = request()->all();
        $post_slug = unicode_str_filter($inputs['post_title']);
        if (!empty($inputs['post_slug'])) {
            $post_slug = unicode_str_filter($inputs['post_slug']);
        }
        $inputs['post_slug'] = $post_slug;
        $validator = self::validator($inputs, $id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        try {
            DB::beginTransaction();
            $post = Posts::findOrFail($id);
            $post->update($inputs);
            if (isset($inputs['post_category']) && !empty($post->id)) {
                $post_category = Category::find($inputs['post_category']);
                $post->posts_categories()->sync($post_category);
            }
            if (isset($inputs['posts_tags']) && !empty($post->id)) {
                $list_tags      = explode(',', $inputs['posts_tags']);
                $posts_tags_ids = [];
                foreach ($list_tags as $tags) {
                    if (!empty($tags)) {
                        $post_tag = Tags::firstOrCreate([
                            'name' => $tags,
                            'slug' => unicode_str_filter($tags)
                        ]);
                        $posts_tags_ids[] = $post_tag['id'];
                    }
                }
                $post->posts_tags()->sync($posts_tags_ids);
            }
            DB::commit();
            return redirect()->route('posts.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update post is failed!']),
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
        $post = Posts::find($id);
        if (empty($post)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }
    
        try {
            DB::beginTransaction();
            $post->posts_categories()->detach(); // Remove id in table pivot
            $post->posts_tags()->detach();
            $post->delete();
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
