<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;

class ManagesController extends Controller
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
        return view('manage.modules.manage.main');
    }

}
