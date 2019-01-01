<?php

namespace App\Http\Controllers\Manage;

use App\Model\Medias;
use App\Model\Medias\Mediasinfo;

use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Storage;

class MediasController extends BackendController
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
        $records = Medias::orderBy('id', 'desc')->paginate(12);
        return view('manage.modules.medias.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.modules.medias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
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
     * @return Response
     */
    public function edit($id)
    {
        $record = Medias::find($id);
        // TODO: Get image with and height
        if (empty($record)) {
            return view('errors.404');
        }

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
            return redirect()->route('medias.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('medias.edit', ['id' => $medias->id])->withInput($mediaInputs)->with([
            'message' => __('system.message.error', ['errors' => 'Update medias info is failed']),
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
        try {
            \DB::beginTransaction();
            $medias = Medias::findOrFail($id);
            $medias->posts_medias_info()->forceDelete();
            $medias->forceDelete();
            // Delete file
            Storage::delete(UPLOAD_MEDIAS . $medias->name);
            \DB::commit();
            // If delete ajax
            if (request()->ajax == true) {
                $data = ['message' => 'Success'];
                return response()->json($data);
            }
            return redirect()->route('medias.index')->with([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error([$e->getMessage(), __METHOD__]);
        }
    }


}
