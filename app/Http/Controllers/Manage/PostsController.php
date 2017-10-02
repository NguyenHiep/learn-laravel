<?php

namespace App\Http\Controllers\Manage;

use App\Model\Medias;
use App\Model\Posts;
use App\Model\Posts\Category;
use App\Model\Posts\Category\Posts_Category_Id;
use App\Model\Posts\Tags;
use App\Model\Posts\Tags\Posts_Tags_Id;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class PostsController extends Controller
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
        $list_cate_all  = Category::all();
        $list_tags_all  = Tags::all();
        $medias         = Medias::all();
        return view('manage.modules.posts.create', compact('list_cate_all', 'list_tags_all', 'medias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->validate(request(),
            ['post_title' => 'required',],
            ['post_title.required' => 'Vui lòng nhập tên bài viết']
        );
        // Get current user login
        $user_info = auth()->user();
        try {
            // Create posts
            $data = new Posts();
            if (isset(request()->post_title)) {
                $data->post_title = request()->post_title;
            }
            if (isset(request()->post_intro)) {
                $data->post_intro = request()->post_intro;
            }
            if (isset(request()->post_full)) {
                $data->post_full = request()->post_full;
            }
            if (isset(request()->post_status)) {
                $data->post_status = request()->post_status;
            }
            if (isset(request()->post_format)) {
                $data->post_format = request()->post_format;
            }
            if (isset(request()->post_keyword)) {
                $data->post_keyword = request()->post_keyword;
            }
            if (!empty($user_info)) {
                $data->user_id = $user_info->id;
            }
            // Save
            if(!empty(request()->posts_medias_id)){
                $data->posts_medias_id = request()->posts_medias_id;
            }
            $data->save();
            if (isset(request()->post_category) && !empty($data->id)) {
                foreach (request()->post_category as $cat_id) {
                    // Insert in    to table posts_category_ids
                    $post_category_ids = new Posts_Category_Id();
                    $post_category_ids->posts_id = $data->id;
                    $post_category_ids->posts_category_id = $cat_id;
                    $post_category_ids->save();
                }
            }
            // Begin add tags of blogs
            if (!empty(request()->posts_tags && !empty($data->id))) {
                $list_tags = explode(',', request()->posts_tags);
                foreach ($list_tags as $tags) {
                    /*
                      + Neu tags bi trung thi lay id tags bi trung chen vao
                      + Nguoc lai thi them tags moi

                     */
                    // Insert into table posts_tags
                    $post_tags = new Tags();
                    $post_tags->name = $tags;
                    $post_tags->slug = unicode_str_filter($tags);
                    $post_tags->save();
                    // Insert into table posts_tags_ids
                    $posts_tags_ids = new Posts_Tags_Id();
                    $posts_tags_ids->posts_tags_id = $post_tags->id;
                    $posts_tags_ids->posts_id = $data->id;
                    $posts_tags_ids->save();

                }
            }

            session()->flash('message', __('system.message.create'));
            return redirect()->route('posts.index');
        } catch (Exception $e) {
            session()->flash('message', __('system.message.errors', $e->getMessage()));
        }

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
        $record = \DB::table('posts')
            ->leftJoin('posts_medias', 'posts.posts_medias_id', '=', 'posts_medias.id')
            ->select('posts.*', 'posts_medias.name as post_featured')
            ->where('posts.id', $id)
            ->get()->first();
        if ($record == null) {
            return view('errors.404');
        }

        // Get category post
        $cat_model = \DB::table('posts_category')
            ->leftJoin('posts_category_ids', 'posts_category.id', '=', 'posts_category_ids.posts_category_id')
            ->where('posts_id', $id)
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
        $tags_model = \DB::table('posts_tags')
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

        $list_cate_all  = Category::all();
        $list_tags_all  = Tags::all();
        $medias         = Medias::all();
        return view('manage.modules.posts.edit', compact('record','list_cate_all', 'list_tags_all', 'medias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $this->validate(request(),
            ['post_title' => 'required',],
            ['post_title.required' => 'Vui lòng nhập tên bài viết']
        );
        try {
            // Create posts
            $data = Posts::find($id);
            if($data == null){
                return view('errors.404');
            }
            if (isset(request()->post_title)) {
                $data->post_title = request()->post_title;
            }
            if (isset(request()->post_intro)) {
                $data->post_intro = request()->post_intro;
            }
            if (isset(request()->post_full)) {
                $data->post_full = request()->post_full;
            }
            if (isset(request()->post_status)) {
                $data->post_status = request()->post_status;
            }
            if (isset(request()->post_format)) {
                $data->post_format = request()->post_format;
            }
            if (isset(request()->post_keyword)) {
                $data->post_keyword = request()->post_keyword;
            }

            // Save
            if(!empty(request()->posts_medias_id)){
                $data->posts_medias_id = request()->posts_medias_id;
            }
            $data->save();

            // Delete table posts_category_ids with posts_id
            $post_category_ids_old = Posts_Category_Id::where('posts_id', $data->id);
            if($post_category_ids_old->count() > 0){
                Posts_Category_Id::where('posts_id', $data->id)->forcedelete();
            }

            //TODO: Update for category when edit
            if (isset(request()->post_category) && !empty($data->id)) {
                foreach (request()->post_category as $cat_id) {
                    // Insert into table posts_category_ids
                    $post_category_ids = new Posts_Category_Id();
                    $post_category_ids->posts_id = $data->id;
                    $post_category_ids->posts_category_id = $cat_id;
                    $post_category_ids->save();
                }
            }
            //TODO: Update for tags when edit
            // Begin add tags of blogs
            if (!empty(request()->posts_tags && !empty($data->id))) {
                $list_tags = explode(',', request()->posts_tags);
                foreach ($list_tags as $tags) {

//                    /*
//                      + Neu tags bi trung thi lay id tags bi trung chen vao
//                      + Nguoc lai thi them tags moi
//
//                     */
//                    // Insert into table posts_tags
//                    $post_tags = new Tags();
//                    $post_tags->name = $tags;
//                    $post_tags->slug = unicode_str_filter($tags);
//                    $post_tags->save();
//                    // Insert into table posts_tags_ids
//                    $posts_tags_ids = new Posts_Tags_Id();
//                    $posts_tags_ids->posts_tags_id = $post_tags->id;
//                    $posts_tags_ids->posts_id = $data->id;
//                    $posts_tags_ids->save();

                }
            }

            session()->flash('message', __('system.message.update'));
            return redirect()->route('posts.index');
        } catch (Exception $e) {
            session()->flash('message', __('system.message.errors', $e->getMessage()));
        }

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
