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
    public function index(Request $request)
    {
        // begin code
        /*$records = \DB::table('comments AS c')
            ->join('posts AS p', 'c.posts_id', '=', 'p.id')
            ->select('c.*', 'p.post_title')
            ->whereNull("c.deleted_at")
            ->get();*/
        $model = Comments::query();
        // Array data request
        $inputs = $request->all();

        if ($request->method() === 'POST') {

            // Check CSRF
            if (\Session::token() === array_get($inputs, '_token')) {

                // Begin
                try {

                    \DB::beginTransaction();
                    // do something
                    $ids    = array_get($inputs,'action_ids');
                    $action = array_get($inputs,'batch_actions');
                    $model  = Comments::query();
                    if(!empty($action)){
                        if(!empty($ids)){
                            $model->whereIn('id', $ids);
                            switch ($action){
                                case 'approve':
                                    $model->update(['comment_status' => 1]);
                                    session()->flash('message', __('system.message.update'));
                                    session()->flash('status', self::CTRL_MESSAGE_SUCCESS);
                                    break;
                                case 'delete':
                                    $model->delete();
                                    session()->flash('message', __('system.message.delete'));
                                    session()->flash('status', self::CTRL_MESSAGE_SUCCESS);
                                    break;
                            }
                        }else{
                            session()->flash('message', 'Vui lòng chọn mẩu tin');
                            session()->flash('status', self::CTRL_MESSAGE_WARNING);
                        }
                    }
                    /*$search_keyword = array_get($inputs,'search_keyword');
                    if(!empty($search_keyword)){
                        $model->orWhere('content', 'like', '%' . $search_keyword . '%');
                    }*/

                    \DB::commit();

                } catch (Exception $e) {
                    \DB::rollBack();
                    \Log::error($e->getMessage(), __METHOD__);
                    session()->flash('message', __('system.message.errors',['errors' => $e->getMessage()]));
                    session()->flash('status', self::CTRL_MESSAGE_ERROR);
                }

                return redirect()->route('comments.index');

            }else{
                \Log::warning('Bad request, invalid CSRF token.', __METHOD__);
                throw new \Exception(__('common.page_has_expired'));
            }

        }
        $records = $model->get();
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
                return response()->json([
                    'message' => __('system.message.delete'),
                    'status'  => self::CTRL_MESSAGE_SUCCESS
                ]);
            } catch (Exception $e) {
                \DB::rollBack();
                return response()->json([
                    'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
                    'status'  => self::CTRL_MESSAGE_ERROR
                ]);
            }

        } else {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        //return redirect()->route('comments.index');
    }

    /**
     * Update and delete multi records
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function batch(Request $request){
        // Array data request
        $inputs = $request->all();
        if ($request->method() === 'POST') {

            // Check CSRF
            if (\Session::token() === array_get($inputs, '_token')) {

                // Begin
                try {

                    \DB::beginTransaction();
                    // do something
                    $ids    = array_get($inputs,'action_ids');
                    $action = array_get($inputs,'batch_actions');
                    $model  = Comments::query();
                    if(!empty($ids)){
                        $model->whereIn('id', $ids);
                        switch ($action){
                            case 'approve':
                                $model->update(['comment_status' => 1]);
                                session()->flash('message', __('system.message.update'));
                                session()->flash('status', self::CTRL_MESSAGE_SUCCESS);
                                break;
                            case 'delete':
                                $model->delete();
                                session()->flash('message', __('system.message.delete'));
                                session()->flash('status', self::CTRL_MESSAGE_SUCCESS);
                                break;
                        }
                    }else{
                        session()->flash('message', 'Vui lòng chọn mẩu tin');
                        session()->flash('status', self::CTRL_MESSAGE_WARNING);
                    }

                    \DB::commit();

                } catch (Exception $e) {
                    \DB::rollBack();
                    \Log::error($e->getMessage(), __METHOD__);
                    session()->flash('message', __('system.message.errors',['errors' => $e->getMessage()]));
                    session()->flash('status', self::CTRL_MESSAGE_ERROR);
                }

                return redirect()->route('comments.index');

            }else{
                \Log::warning('Bad request, invalid CSRF token.', __METHOD__);
                throw new \Exception(__('common.page_has_expired'));
            }

        }else{
            throw new \Exception(__('common.page_has_expired'));
        }
    }
}
