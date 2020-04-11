<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BackendController;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class ManagesController extends BackendController
{

    public function __construct()
    {
        $this->middleware('permission:dashboard-list', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('manage.modules.manage.main');
    }

}
