<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\CustomersDataTable;
use App\Repositories\CustomerRepository;
use App\Validators\CustomerValidator;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Log;
use Prettus\Validator\Exceptions\ValidatorException;
use Storage;

class CustomersController extends BackendController
{
    /**
     * The customer repository implementation.
     *
     * @var CustomerRepository
     */
    protected $repository;

    /**
     * @var CustomerValidator
     */
    protected $validator;

    public function __construct(CustomerRepository $repository, CustomerValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('manage.modules.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        try {
            $this->validator->with($inputs)->passesOrFail( CustomerValidator::RULE_CREATE );
            $inputs['password'] = bcrypt($inputs['password']);
            if ($request->hasFile('avatar')) {
                $pathAvatar = Storage::put(UPLOAD_AVATAR, $request->file('avatar'));
                $inputs['avatar'] = $pathAvatar;
            }
            if (empty($inputs['birthday'])) {
                $inputs['birthday'] = null;
            }
            DB::beginTransaction();
            $this->repository->create($inputs);
            DB::commit();
            return redirect()->route('customers.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput($inputs);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => __('Create customer is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->repository->find($id);
        return view('manage.modules.customers.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $inputs = $request->all();
        try {
            $this->validator->setId($id);
            $this->validator->with($inputs)->passesOrFail( CustomerValidator::RULE_UPDATE );
            if (!empty($inputs['password'])) {
                $inputs['password'] = bcrypt($inputs['password']);
            }
            if ($request->hasFile('avatar')) {
                $pathAvatar = Storage::put(UPLOAD_AVATAR, $request->file('avatar'));
                $inputs['avatar'] = $pathAvatar;
            }
            if (empty($inputs['birthday'])) {
                $inputs['birthday'] = null;
            }
            DB::beginTransaction();
            $this->repository->update($inputs, $id);
            DB::commit();
            return redirect()->route('customers.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput($inputs);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => __('Update customer is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
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
