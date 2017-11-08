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
        $records = \DB::table('comments AS c')
            ->join('posts AS p', 'c.posts_id', '=', 'p.id')
            ->select('c.*', 'p.post_title')
            ->whereNull("c.deleted_at")
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
                $this->validate($request,
                    [
                        'action_ids'      => 'required',
                    ]
                );
                /*if(!empty(array_get($inputs,'action_ids'))){
                    array_set($inputs, 'action_ids', implode(',',array_get($inputs,'action_ids'))); // Return 1,2,3
                }*/

                // Begin
                try {

                    \DB::beginTransaction();
                    // do something

                    \DB::commit();
                    session()->flash('message', __('system.message.update'));
                    session()->flash('status', self::CTRL_MESSAGE_SUCCESS);

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
