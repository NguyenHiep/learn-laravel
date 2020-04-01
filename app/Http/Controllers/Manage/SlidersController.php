<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\SlidersDataTable;
use App\Http\Requests\SlidersRequest;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use App\Model\Sliders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Helppers\Uploads;

class SlidersController extends BackendController
{

    /**
     * The slider repository implementation.
     *
     * @var SliderRepository
     */
    protected $repository;

    public function __construct(SliderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $sliders = $this->repository->getListSlider();
            $dataTables = new SlidersDataTable($sliders);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id' => [
                'label' => __('common.sliders.slider_id')
            ],
            'slider_img' => [
                'label'      => __('common.sliders.slider_img'),
                'searchable' => false,
                'orderable'  => false
            ],
            'slider_title' => [
                'label' => __('common.sliders.slider_title'),
            ],
            'slider_content' => [
                'label'      => __('common.sliders.slider_content'),
                'searchable' => false,
                'orderable'  => false
            ],
            'slider_status' => [
                'label' => __('common.sliders.slider_status')
            ],
            'actions' => [
                'label'      => __('common.sliders.slider_actions'),
                'searchable' => false,
                'orderable'  => false
            ]
        ];
        $dtColumns = SlidersDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.sliders.index')->with($withData);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.modules.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlidersRequest $request)
    {
        $inputs = $request->all();
        $slider_img = Uploads::upload($request, 'slider_img', UPLOAD_SLIDER);
        if($slider_img){
            $inputs['slider_img'] = $slider_img;
        }
        $inputs['user_id'] = Auth::user()->id;
        try {
            DB::beginTransaction();
            $slider = new Sliders();
            $slider->fill($inputs);
            $slider->save();
            DB::commit();
            return redirect()->route('sliders.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create slider is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
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
        $record = Sliders::find($id);
        if (empty($record)) {
            return abort(404);
        }
        return view('manage.modules.sliders.edit')->with(['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlidersRequest $request, $id)
    {
        $slider = Sliders::find($id);
        if (empty($slider)) {
            return abort(404);
        }
        $inputs = $request->all();

        $slider_img = Uploads::upload($request, 'slider_img', UPLOAD_SLIDER);
        if($slider_img){
            $inputs['slider_img'] = $slider_img;
        }

        try {
            DB::beginTransaction();
            $slider->update($inputs);
            DB::commit();
            return redirect()->route('sliders.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('sliders.edit', ['id' => $slider->id])->withInput($inputs)->with([
            'message' => __('system.message.error', ['errors' => 'Update slider is failed']),
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
        $slider = Sliders::find($id);
        if (empty($slider)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            \DB::beginTransaction();
            $slider->delete();
            \DB::commit();
            return response()->json([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
            return response()->json([
                'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }
    }
}
