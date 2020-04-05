<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\CustomersDataTable;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;

class CustomersController extends BackendController
{
    /**
     * The customer repository implementation.
     *
     * @var CustomerRepository
     */
    protected $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $customers = $this->repository->getListCustomer();
            $dataTables = new CustomersDataTable($customers);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id' => [
                'label' => __('common.customers.id')
            ],
            'username' => [
                'label' => __('common.customers.username')
            ],
            'email' => [
                'label' => __('common.customers.email')
            ],
            'last_login' => [
                'label' => __('common.customers.last_login')
            ],
            'status' => [
                'label' => __('common.customers.status')
            ],
            'actions' => [
                'label'      => __('common.customers.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = CustomersDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.customers.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.modules.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $customer = $this->repository->find($id);
        if (empty($customer)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            \DB::beginTransaction();
            $customer->delete();
            \DB::commit();
            return response()->json([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error([$e->getMessage(), __METHOD__]);
        }
        return response()->json([
            'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }
}
