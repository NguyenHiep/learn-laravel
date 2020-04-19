<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BackendController;
use App\Repositories\CommentRepository;
use App\Repositories\CustomerRepository;
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
        $commentTotal = app(CommentRepository::class)->count();
        $customerTotal = app(CustomerRepository::class)->count();
        $orderRepo = app(OrderRepository::class);
        return view('manage.modules.manage.main', [
            'latestOrder'   => $orderRepo->getLatestOrder(),
            'totalSales'    => $orderRepo->getTotalPrice(),
            'commentTotal'  => $commentTotal,
            'customerTotal' => $customerTotal
        ]);
    }

}
