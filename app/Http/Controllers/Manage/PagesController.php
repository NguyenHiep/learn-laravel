<?php

namespace App\Http\Controllers\Manage;

use App\Model\Pages;
use App\Model\Medias;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
#use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class PagesController extends Controller
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
        //
        $records = [];
        return view('manage.modules.pages.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $medias         = Medias::all();
        return view('manage.modules.pages.create', compact('medias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Array data request
        $inputs = $request->all();
        if ($request->method() === 'POST') {
            // Check CSRF
            if (\Session::token() === array_get($inputs, '_token')) {
                $this->validate($request,
                    [
                        'page_title'     => 'required|unique:pages|max:255',
                        'page_full'      => 'required',
                        'page_status'    => 'required',
                        'page_attribute' => 'required',
                    ]
                );

                // Begin
                try {
                    \DB::beginTransaction();

                    // Get current user login
                    $user_info = auth()->user();

                    $pages = new Pages;
                    $pages->page_title      = array_get($inputs, 'page_title');
                    if (!empty(array_get($inputs, 'page_slug'))) {
                        $pages->page_slug   = unicode_str_filter(array_get($inputs, 'page_slug'));
                    } else {
                        $pages->page_slug   = unicode_str_filter(array_get($inputs, 'page_title'));
                    }
                    $pages->page_intro      = array_get($inputs, 'page_intro');
                    $pages->page_full       = array_get($inputs, 'page_full');
                    if(!empty(array_get($inputs, 'page_medias_id'))){
                        $pages->page_medias_id  = array_get($inputs, 'page_medias_id');
                    }
                    $pages->page_status     = array_get($inputs, 'page_status');
                    $pages->page_attribute  = array_get($inputs, 'page_attribute', '');
                    $pages->page_keyword    = array_get($inputs, 'page_keyword');
                    /*$pages->visit = array_get($inputs, 'visit');*/
                    if (!empty($user_info)) {
                        $pages->user_id     = $user_info->id;
                    }

                    $pages->save();

                    \DB::commit();
                    \Session::flash('message', __('system.message.create'));

                } catch (Exception $e) {
                    \DB::rollBack();
                    \Log::error($e->getMessage(), __METHOD__);
                    \Session::flash('message', __('system.message.errors', $e->getMessage()));
                }

                return redirect()->route('pages.index');

            }

        }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
