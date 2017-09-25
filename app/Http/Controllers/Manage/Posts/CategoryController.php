<?php

namespace App\Http\Controllers\Manage\Posts;

use App\Model\Posts\Category;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
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
        $list_cate_all = Category::all();

        $records = Category::orderBy('id', 'asc')->paginate(12);

        //
//        $posts_category = Category::with('children')
//                            ->where('parent_id', '=', 0)
//                            ->orderBy('id', 'asc')
//                            ->get();


        return view('manage.modules.posts.category.index', compact('records', 'list_cate_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('manage.modules.posts.category.create');
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
            ['name.required' => 'Vui lòng nhập tên chuyên mục']
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


        $category = new Category();
        $category->name         = request()->name;
        $category->slug         = request()->slug;
        $category->parent_id    = request()->parent_id;
        $category->description  = $dom->saveHTML();
        $category->save();
        session()->flash('message', __('system.message.create'));
        return redirect()->route('category.index');
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
        $list_cate_all = Category::all();
        $record =  Category::findOrFail($id);
        return view('manage.modules.posts.category.edit', compact('record','list_cate_all'));
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
        $record = Category::findOrFail($id);
        // Begin validate
        $this->validate(request(),
            ['name'   => 'required',],
            ['name.required' => 'Vui lòng nhập tên chuyên mục']
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
        $record->parent_id    = request()->parent_id;
        $record->description  = $dom->saveHTML();
        $record->save();
        session()->flash('message', __('system.message.update'));
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //Category::where('id', $id)->forcedelete(); Delete in data
        Category::where('id', $id)->delete();
        session()->flash('message', __('system.message.delete'));
        return redirect()->route('category.index');
    }


}
