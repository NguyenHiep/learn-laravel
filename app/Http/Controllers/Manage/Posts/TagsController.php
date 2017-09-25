<?php

namespace App\Http\Controllers\Manage\Posts;

use App\Model\Posts\Tags;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class TagsController extends Controller
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
        $records = Tags::orderBy('id', 'asc')->paginate(12);
        return view('manage.modules.posts.tags.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('manage.modules.posts.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // Begin validate
        $this->validate(request(),
            ['name'   => 'required',],
            ['name.required' => 'Vui lòng nhập tên thẻ']
        );
        // Begin create category
        $description = request()->description;
        $dom = new \DomDocument();
        // $dom->loadHtml(mb_convert_encoding($description, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $dom->loadHtml(mb_convert_encoding($description, 'HTML-ENTITIES', "UTF-8"), 8192 | 4);

        $images = $dom->getElementsByTagName('img');

        // foreach <img> in the submited message
        foreach($images as $img){
            $src = $img->getAttribute('src');

            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)){

                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];

                // Generating a random filename
                $filename = uniqid();
                $filepath = 'category/' . $filename . '.' . $mimetype;

                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100) 	// encode file to the specified mimetype
                    ->save(public_path($filepath));

                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!--endforeach


        $tags = new Tags();
        $tags->name         = request()->name;
        $tags->slug         = request()->slug;
        $tags->description  = $dom->saveHTML();
        $tags->save();
        session()->flash('message', __('system.message.create'));
        return redirect()->route('tags.index');
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
        $record =  Tags::findOrFail($id);
        return view('manage.modules.posts.tags.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //Get data info
        $record = Tags::findOrFail($id);
        // Begin validate
        $this->validate(request(),
            ['name'   => 'required',],
            ['name.required' => 'Vui lòng nhập tên thẻ']
        );
        $description = request()->description;
        $dom = new \DomDocument();
        // $dom->loadHtml(mb_convert_encoding($description, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $dom->loadHtml(mb_convert_encoding($description, 'HTML-ENTITIES', "UTF-8"), 8192 | 4);

        $images = $dom->getElementsByTagName('img');

        // foreach <img> in the submited message
        foreach($images as $img){
            $src = $img->getAttribute('src');

            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)){

                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];

                // Generating a random filename
                $filename = uniqid();
                $filepath = 'category/' . $filename . '.' . $mimetype;

                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100) 	// encode file to the specified mimetype
                    ->save(public_path($filepath));

                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!--endforeach

        $record->name         = request()->name;
        $record->slug         = request()->slug;
        $record->description  = $dom->saveHTML();
        $record->save();
        session()->flash('message', __('system.message.update'));
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Tags::where('id', $id)->delete();
        session()->flash('message', __('system.message.delete'));
        return redirect()->route('tags.index');
    }


}
