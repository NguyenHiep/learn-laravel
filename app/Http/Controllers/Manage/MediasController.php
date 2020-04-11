<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\PostMediasDataTable;
use App\Model\Medias;

use App\Http\Controllers\BackendController;
use App\Repositories\PostMediaRepository;
use Illuminate\Support\Facades\Storage;

class MediasController extends BackendController
{
    /**
     * The post media repository implementation.
     *
     * @var PostMediaRepository
     */
    protected $repository;

    public function __construct(PostMediaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            $postMedias = $this->repository->getListPostMedia();
            $dataTables = new PostMediasDataTable($postMedias);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id' => [
                'label' => __('common.comments.list.id')
            ],
            'name' => [
                'label' => __('Tập tin'),
                'searchable' => false,
                'orderable'  => false,
            ],
            'username' => [
                'label' => __('Tác giả'),
                'searchable' => false,
                'orderable'  => false
            ],
            'attachment' => [
                'label' => __('Đính kèm'),
                'searchable' => false,
                'orderable'  => false
            ],
            'created_at' => [
                'label' => __('Ngày tải lên')
            ],
            'actions' => [
                'label'      => __('common.comments.list.actions'),
                'searchable' => false,
                'orderable'  => false
            ]
        ];
        $dtColumns = PostMediasDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.medias.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('manage.modules.medias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store()
    {
        $this->validate(request(), [
                'file' => 'mimes:jpeg,jpg,png,gif,svg,doc,docx,csv,txt,mp4,mp3 | max:2048',
            ]
        );
        $result = [
            'status'  => 'error',
            'message' => 'Failed',
        ];
        if (request()->hasFile('file')) {
            $files           = request()->file('file');
            $file_size       = $files->getClientSize();
            $file_mimes      = $files->getMimeType();
            $file_extension  = $files->getClientOriginalExtension();
            $filename        = sha1(uniqid() . time() . time()) . ".{$file_extension}";
            $path_filename   = $files->storeAs(UPLOAD_MEDIAS, $filename);
            $extension_img   = ['jpeg', 'jpg', 'png', 'gif', 'svg'];
            $extension_files = ['doc', 'docx', 'csv', 'txt'];
            $extension_video = ['mp3', 'mp4'];
            $file_type       = '';
            if (in_array($file_extension, $extension_img, true)) {
                $file_type = 'image';
            } elseif (in_array($file_extension, $extension_files, true)) {
                $file_type = 'file';
            } elseif (in_array($file_extension, $extension_video, true)) {
                $file_type = 'video';
            }
            
            if ($path_filename) {
                $medias = Medias::create([
                    'name'    => $filename,
                    'types'   => $file_type,
                    'user_id' => auth()->user()->id
                ]);
                $medias->posts_medias_info()->create([
                    'extension' => $file_mimes,
                    'size'      => $file_size,
                    'lightbox'  => 0
                ]);
                $result = [
                    'status'  => 'success',
                    'id'      => $medias['id'],
                    'message' => 'Success',
                ];
            }
            
        }
        return response()->json($result);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $record = Medias::findOrFail($id);
        return view('manage.modules.medias.edit', compact('record'));
    }
    
    /***
     *  Update the specified resource in storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $mediaInputs = request()->mediasinfo;
        $medias      = Medias::with('posts_medias_info')->findOrFail($id);
        try {
            \DB::beginTransaction();
            $medias->posts_medias_info->update([
                'caption'     => $mediaInputs['caption'] ?? '',
                'alt'         => $mediaInputs['alt'] ?? '',
                'description' => $mediaInputs['description'] ?? '',
                'lightbox'    => $mediaInputs['lightbox'] ?? 0
            ]);
            \DB::commit();
            return redirect()->route('manage.medias.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->route('manage.medias.edit', ['id' => $medias->id])->withInput($mediaInputs)->with([
            'message' => __('system.message.error', ['errors' => 'Update medias info is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $medias = Medias::find($id);
        if (empty($medias)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            \DB::beginTransaction();
            $medias->posts_medias_info()->forceDelete();
            Storage::delete(UPLOAD_MEDIAS . $medias->name);
            $medias->forceDelete();
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
