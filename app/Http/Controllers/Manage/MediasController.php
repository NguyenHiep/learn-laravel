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
        // Get current user login
        $user_info = auth()->user();
        $this->validate(request(),
            [
                'file'   => 'mimes:jpeg,jpg,png,gif,svg,doc,docx,csv,txt,mp4,mp3 | max:2048',
            ]
        );

        if (request()->hasFile('file')) {
            //echo $file_name = request()->file('file')->getClientOriginalName();
            $file_size = request()->file('file')->getClientSize();
            $file_mimes = request()->file('file')->getMimeType();
            $file_extension = request()->file('file')->getClientOriginalExtension();
            $filename = sha1(uniqid().time().time()).".{$file_extension}";
            $path_filename = request()->file('file')->storeAs(UPLOAD_MEDIAS, $filename);

            if( $path_filename ) {

                // Begin save image in database
                $medias = new Medias();
                $medias->name = $filename;
                $extension_img = ['jpeg','jpg','png','gif','svg'];
                $extension_files = ['doc','docx','csv','txt'];
                $extension_video = ['mp3','mp4'];
                if(in_array($file_extension, $extension_img, true)){
                    $medias->types = 'image';
                }elseif(in_array($file_extension, $extension_files, true)){
                    $medias->types = 'file';
                }elseif(in_array($file_extension, $extension_video, true)){
                    $medias->types = 'video';
                }
                $medias->user_id = $user_info->id;
                $medias->save();

                // Begin update medias info image
                $medias_info = new Mediasinfo();
                $medias_info->id = $medias->id;
                $medias_info->extension = $file_mimes;
                $medias_info->size = $file_size;
                //$medias_info->width = $medias->id;
                //$medias_info->height = $medias->id;
                $medias_info->save();

                $data = [
                    'status'  => 'success',
                    'id'      => $medias->id,
                    'message' => 'Success',
                ];
                return response()->json($data);
            } else {
                $data = [
                    'status'  => 'error',
                    'message' => 'Failed',
                ];
                return response()->json($data);
            }
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
        $record = Medias::find($id);
        // TODO: Get image with and height
        if (empty($record)) {
            return view('errors.404');
        }

        return view('manage.modules.medias.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $medias_info = Mediasinfo::find($id);
        $medias_info->caption       = request()->mediasinfo['caption'];
        $medias_info->alt           = request()->mediasinfo['alt'];
        $medias_info->description   = request()->mediasinfo['description'];
        if(isset(request()->mediasinfo['lightbox'])){
            $medias_info->lightbox      = request()->mediasinfo['lightbox'];
        }

        //$medias_info->save();

        $medias = Medias::find($id);
        $medias->posts_medias_info()->save($medias_info);

        session()->flash('message', __('system.message.update'));
        return redirect()->route('medias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if(request()->ajax == true){
            // Get info
            $medias = Medias::findOrFail($id);

            // Delete in database
            Medias::where('id', $id)->forcedelete();
            Mediasinfo::where('id', $id)->forcedelete();

            // Delete file
            Storage::delete(UPLOAD_MEDIAS.$medias->name);

            $data = ['message' => 'Success'];
            return response()->json($data);

        }else{
            // Get info
            $medias = Medias::findOrFail($id);

            // Delete in database
            Medias::where('id', $id)->forcedelete();
            Mediasinfo::where('id', $id)->forcedelete();

            // Delete file
            Storage::delete(UPLOAD_MEDIAS.$medias->name);

            session()->flash('message', __('system.message.delete'));
            return redirect()->route('medias.index');
        }

    }


}
