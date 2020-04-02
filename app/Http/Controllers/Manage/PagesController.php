<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\PagesDataTable;
use App\Model\Pages;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use DB;
use Illuminate\Support\Facades\Validator;
use Log;
use Mockery\Exception;

class PagesController extends BackendController
{
    /**
     * The page repository implementation.
     *
     * @var PageRepository
     */
    protected $repository;

    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }
    
    /***
     * Validate input pages
     * @param array    $data
     * @param int|null $id
     *
     * @return \Illuminate\Validation\Validator
     */
    protected static function validator(array $data, int $id = null)
    {
        return Validator::make($data, [
            'page_title'  => 'required|string|unique:pages,page_title,' . $id,
            'page_slug'   => 'required|string|unique:pages,page_slug,' . $id,
            'page_full'   => 'required|string',
            'page_status' => 'required'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $pages = $this->repository->getListPage();
            $dataTables = new PagesDataTable($pages);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id' => [
                'label' => __('common.pages.list.id')
            ],
            'page_featured' => [
                'label'      => __('common.pages.list.page_featured'),
                'searchable' => false,
                'orderable'  => false,
            ],
            'page_title' => [
                'label' => __('common.pages.list.page_title')
            ],
            'author' => [
                'label'      => __('common.pages.list.author'),
                'searchable' => false,
                'orderable'  => false
            ],
            'created_at' => [
                'label' => __('common.pages.list.created_at')
            ],
            'page_status' => [
                'label' => __('common.pages.list.page_status')
            ],
            'actions' => [
                'label'      => __('common.pages.list.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = PagesDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.pages.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.modules.pages.create')->with(['medias' => $this->medias]);
    }

    /***
     * Store a newly created resource in storage.
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $inputs    = $request->all();
        $page_slug = unicode_str_filter($inputs['page_title']);
        if (!empty($inputs['page_slug'])) {
            $page_slug = unicode_str_filter($inputs['page_slug']);
        }
        $inputs['page_slug']      = $page_slug;
        $inputs['user_id']        = auth()->user()->id;
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        try {
            DB::beginTransaction();
            $pages = new Pages();
            $pages->fill($inputs);
            $pages->save();
            DB::commit();
            return redirect()->route('pages.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), __METHOD__);
        }
        return redirect()->back()->with([
            'message' => __('system.message.errors', ['errors' => 'Create page failed!']),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);

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
        $record = Pages::with('media')->findOrFail($id);
        $medias = $this->medias;
        return view('manage.modules.pages.edit', compact('record','medias'));
    }

    /***
     * Update the specified resource in storage.
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $inputs    = $request->all();
        $page_slug = unicode_str_filter($inputs['page_title']);
        if (!empty($inputs['page_slug'])) {
            $page_slug = unicode_str_filter($inputs['page_slug']);
        }
        $inputs['page_slug']      = $page_slug;
        $validator                = self::validator($inputs, $id);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }
        try {
        
            DB::beginTransaction();
            $pages = Pages::findOrFail($id);
            $pages->update($inputs);
            DB::commit();
            return redirect()->route('pages.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), __METHOD__);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update page is failed!']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Pages::find($id);
        if (empty($page)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            DB::beginTransaction();
            $page->delete();
            DB::commit();
            return response()->json([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage(), __METHOD__);
        }

        return response()->json([
            'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }
}
