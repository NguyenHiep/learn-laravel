<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\ProductCommentsDataTable;
use App\Repositories\ProductCommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Validator;

class ProductCommentsController extends BackendController
{
    /**
     * The product comment repository implementation.
     *
     * @var ProductCommentRepository
     */
    protected $repository;

    public function __construct(ProductCommentRepository $repository)
    {
        $this->middleware('permission:product-comment-list', ['only' => ['index']]);
        $this->middleware('permission:product-comment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-comment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-comment-delete', ['only' => ['destroy']]);
        $this->repository = $repository;
    }
    
    /***
     * Validator input request
     *
     * @param      $data
     *
     * @return mixed
     */
    protected static function validator($data)
    {
        return Validator::make($data, [
            'name'    => 'required|string',
            'content' => 'required|string',
            'status'  => 'required|integer'
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
            $dataTables = new ProductCommentsDataTable($comments);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id' => [
                'label' => __('common.products.comments.list.id')
            ],
            'name' => [
                'label' => __('common.products.comments.list.name')
            ],
            'product_name' => [
                'label' => __('common.products.comments.list.product_name'),
                'searchable' => false,
                'orderable'  => false,
            ],
            'rate' => [
                'label' => __('common.products.comments.list.rate')
            ],
            'status' => [
                'label' => __('common.products.comments.list.status')
            ],
            'ip_user' => [
                'label' => __('common.products.comments.list.ip_user')
            ],
            'created_at' => [
                'label' => __('common.products.comments.list.created_at')
            ],
            'actions' => [
                'label'      => __('common.products.comments.list.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = ProductCommentsDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.products.comments.index')->with($withData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $record = $this->repository->with(['product'])->find($id);
        return view('manage.modules.products.comments.edit',['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $inputs    = $request->all();
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        $comment = $this->repository->find($id);
        try {
            \DB::beginTransaction();
            $comment->update($inputs);
            \DB::commit();
            return redirect()->route('manage.products.comments.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->route('manage.products.comments.edit', ['id' => $comment->id])->withInput($inputs)->with([
            'message' => __('system.message.error', ['errors' => __('Update comment is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $comment = $this->repository->findWhere(['id' => $id])->first();
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
}
