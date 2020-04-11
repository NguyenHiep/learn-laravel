<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\CommentsDataTable;
use App\Model\Comments;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Validator;

class CommentsController extends BackendController
{
    /**
     * The comment repository implementation.
     *
     * @var CommentRepository
     */
    protected $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /***
     * @param      $data
     * @param null $id
     *
     * @return mixed
     */
    protected static function validator($data, $id = null)
    {
        return Validator::make($data, [
            'name'           => 'required|string',
            'email'          => 'required|email',
            'content'        => 'required|string',
            'url'            => 'required|url',
            'comment_status' => 'required|integer'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        if (request()->ajax()) {
            $comments = $this->repository->getListComment();
            $dataTables = new CommentsDataTable($comments);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id' => [
                'label' => __('common.comments.list.id')
            ],
            'name' => [
                'label' => __('common.comments.list.name'),
                'searchable' => false,
                'orderable'  => false,
            ],
            'email' => [
                'label' => __('common.comments.list.email')
            ],
            'created_at' => [
                'label' => __('common.comments.list.created_at')
            ],
            'ip_user' => [
                'label' => __('common.comments.list.ip_user')
            ],
            'comment_status' => [
                'label' => __('common.comments.list.comment_status')
            ],
            'actions' => [
                'label'      => __('common.comments.list.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = CommentsDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.comments.index')->with($withData);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $record = Comments::findOrFail($id);
        return view('manage.modules.comments.edit',['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $inputs    = $request->all();
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $comment = Comments::findOrFail($id);
        try {
            \DB::beginTransaction();
            $comment->update($inputs);
            \DB::commit();
            return redirect()->route('manage.comments.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->route('manage.comments.edit', ['id' => $comment->id])->withInput($inputs)->with([
            'message' => __('system.message.error', ['errors' => 'Update comment is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $comment = Comments::find($id);
        if (empty($comment)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            \DB::beginTransaction();
            $comment->delete();
            \DB::commit();
            return response()->json([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error(__METHOD__, [$e->getMessage()]);
        }
        return response()->json([
            'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
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

                } catch (\Exception $e) {
                    \DB::rollBack();
                    \Log::error(__METHOD__, [$e->getMessage()]);
                    session()->flash('message', __('system.message.errors',['errors' => $e->getMessage()]));
                    session()->flash('status', self::CTRL_MESSAGE_ERROR);
                }

                return redirect()->route('manage.comments.index');

            }else{
                \Log::warning('Bad request, invalid CSRF token.', __METHOD__);
                throw new \Exception(__('common.page_has_expired'));
            }

        }else{
            throw new \Exception(__('common.page_has_expired'));
        }
    }
}
