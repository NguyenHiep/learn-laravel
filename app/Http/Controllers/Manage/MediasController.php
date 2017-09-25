<?php

namespace App\Http\Controllers\Manage;

use App\Model\Medias;
use App\Model\Medias\Mediasinfo;

use App\Http\Controllers\Controller;

class MediasController extends Controller
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

        return view('manage.modules.medias.index');
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

        $this->validate(request(),
            [
                'file'   => 'mimes:jpeg,jpg,png,gif,svg,doc,docs,csv,txt,mp4,mp3 | max:1000',
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
                $extension_files = ['doc','docs','csv','txt'];
                $extension_video = ['mp3','mp4'];
                if(in_array($file_extension, $extension_img, true)){
                    $medias->types = 'image';
                }elseif(in_array($file_extension, $extension_files, true)){
                    $medias->types = 'file';
                }elseif(in_array($file_extension, $extension_video, true)){
                    $medias->types = 'video';
                }
                $medias->save();

                // Begin update medias info image
                $medias_info = new Mediasinfo();
                $medias_info->id = $medias->id;
                $medias_info->extension = $file_mimes;
                $medias_info->size = $file_size;
                //$medias_info->width = $medias->id;
                //$medias_info->height = $medias->id;
                $medias_info->save();

                return response()->json(
                    ['success' => 200,]
                );
            } else {
                return response()->json(
                    ['error' => 400,]
                );
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


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }


}
