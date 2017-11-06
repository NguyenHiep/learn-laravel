<?php

namespace App\Http\Controllers\Manage;

use App\Model\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
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
        // begin code
        $records = \DB::table('comments')
            ->join('posts', 'comments.posts_id', '=', 'posts.id')
            //->leftJoin('posts_medias', 'posts.posts_medias_id', '=', 'posts_medias.id')
            //->select('posts.*', 'users.username', 'posts_medias.name as post_featured')
            ->whereNull("comments.deleted_at")
            ->get();
        return view('manage.modules.comments.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!empty(Comments::find($id))) {
            try {
                \DB::beginTransaction();

                Comments::where('id', $id)->delete();

                \DB::commit();
                \Session::flash('message', __('system.message.delete'));
            } catch (Exception $e) {
                \DB::rollBack();
                \Log::error($e->getMessage(), __METHOD__);
                \Session::flash('message', __('system.message.errors', $e->getMessage()));
            }

        } else {
            \Session::flash('message', __('system.message.errors'));
        }

        return redirect()->route('comments.index');
    }
}
