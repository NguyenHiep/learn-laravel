<?php

namespace App\Http\Controllers\Manage;

use App\Model\Posts;
use App\Model\Posts\Category;
use App\Model\Posts\Tags;
use App\Model\Posts\Tags\Posts_Tags_Id;
use App\Http\Controllers\BackendController;
use DB;
use Log;
use Mockery\Exception;

class PostsController extends BackendController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = \DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('posts_medias', 'posts.posts_medias_id', '=', 'posts_medias.id')
            ->select('posts.*', 'users.username', 'posts_medias.name as post_featured')
            ->get();
        if(!empty($records)){
            foreach ($records as &$record) {
                // Get list category
                $categories = \DB::table('posts_category')
                    ->leftJoin('posts_category_ids', 'posts_category.id', '=', 'posts_category_ids.posts_category_id')
                    ->where('posts_id', $record->id)
                    ->get();
                $list_cate = [];
                foreach ($categories as $category) {
                    $list_cate[] = $category->name;
                }
                $record->categories = implode(', ', $list_cate);
                // Get list tags
                $tags = \DB::table('posts_tags')
                    ->leftJoin('posts_tags_ids', 'posts_tags.id', '=', 'posts_tags_ids.posts_tags_id')
                    ->where('posts_id', $record->id)
                    ->get();
                $list_tag = [];
                foreach ($tags as $tag) {
                    $list_tag[] = $tag->name;
                }
                $record->tags = implode(', ', $list_tag);

            }
        }

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
        $this->validate(request(),
            ['post_title' => 'required',],
            ['post_title.required' => 'Vui lòng nhập tên bài viết']
        );
        try {
            DB::beginTransaction();
            $post = new Posts();
            $post->fill($inputs);
            $post->save();
            if (isset($inputs['post_category']) && !empty($post->id)) {
                $post_category = Category::find($inputs['post_category']);
                $post->posts_categories()->attach($post_category);
            }
            //TODO: Refactor code create tags and assigned tag in new post
            if (isset($inputs['post_tags']) && !empty($post->id)) {
                $list_tags = explode(',', $inputs['post_tags']);
                foreach ($list_tags as $tags) {
                    // Insert into table posts_tags
                    $post_tags       = new Tags();
                    $post_tags->name = $tags;
                    $post_tags->slug = unicode_str_filter($tags);
                    $post_tags->save();
                    //$post_tags->posts()->attach($post_tags);
                    // Insert into table posts_tags_ids
                    $posts_tags_ids                = new Posts_Tags_Id();
                    $posts_tags_ids->posts_tags_id = $post_tags->id;
                    $posts_tags_ids->posts_id      = $post->id;
                    $posts_tags_ids->save();
                
                }
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
        $record = DB::table('posts')
            ->leftJoin('posts_medias', 'posts.posts_medias_id', '=', 'posts_medias.id')
            ->select('posts.*', 'posts_medias.name as post_featured')
            ->where('posts.id', $id)
            ->get()->first();
        if (empty($record)) {
            return view('errors.404');
        }

        // Get category post
        $cat_model = DB::table('posts_category AS pc')
            ->leftJoin('posts_category_ids AS pci', 'pc.id', '=', 'pci.posts_category_id')
            ->where('pci.posts_id', $id)
            ->get();
        $record->cats = null;
        if (!empty($cat_model)) {
            $cats = [];
            foreach ($cat_model as $cat) {
                $cats [] = $cat->posts_category_id; // Id Duplicate
            }
            $record->cats = $cats;
        }

        // Get list tags
        $tags_model = DB::table('posts_tags')
            ->leftJoin('posts_tags_ids', 'posts_tags.id', '=', 'posts_tags_ids.posts_tags_id')
            ->where('posts_id', $id)
            ->get();
        $record->tags = null;
        if (!empty($tags_model)) {
            $tags = null;
            foreach ($tags_model as $tag) {
                $tags .= ',' . $tag->name;
            }
            $record->tags = ltrim($tags, ',');
        }
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
        $inputs = request()->all();
        $post_slug = unicode_str_filter($inputs['post_title']);
        if (!empty($inputs['post_slug'])) {
            $post_slug = unicode_str_filter($inputs['post_slug']);
        }
        $inputs['post_slug'] = $post_slug;
        $this->validate(request(),
            ['post_title' => 'required',],
            ['post_title.required' => 'Vui lòng nhập tên bài viết']
        );
        try {
            DB::beginTransaction();
            // Create posts
            $post = Posts::findOrFail($id);
            $post->update($inputs);
            if (isset($inputs['post_category']) && !empty($post->id)) {
                $post_category = Category::find($inputs['post_category']);
                $post->posts_categories()->sync($post_category);
            }
            //TODO: Update for tags when edit
            if (isset($inputs['post_tags']) && !empty($post->id)) {
                $list_tags = explode(',', request()->posts_tags);
                foreach ($list_tags as $tags) {
                    // TODO: Code here
                }
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

    }

}
