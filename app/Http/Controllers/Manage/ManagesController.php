<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BackendController;
use App\Repositories\OrderRepository;
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
        $latestOrder = app(OrderRepository::class)->getLatestOrder();
        return view('manage.modules.manage.main', compact('latestOrder'));
    }

}
