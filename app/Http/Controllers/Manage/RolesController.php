<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\RolesDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Validators\RoleValidator;
use DB;
use Illuminate\Http\Request;
use Log;
use Prettus\Validator\Exceptions\ValidatorException;

class RolesController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var RoleRepository
     */
    protected $repository;

    /**
     * @var RoleValidator
     */
    protected $validator;

    public function __construct(RoleRepository $repository, RoleValidator $validator)
    {
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
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
            $roles = $this->repository->getListRole();
            $dataTables = new RolesDataTable($roles);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id'       => [
                'label' => __('common.roles.id')
            ],
            'name' => [
                'label' => __('common.roles.name')
            ],
            'created_at'    => [
                'label' => __('common.roles.created_at')
            ],
            'updated_at'    => [
                'label' => __('common.roles.updated_at')
            ],
            'actions'  => [
                'label'      => __('common.roles.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = RolesDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.roles.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permission = app(PermissionRepository::class)->getListPermission();
        return view('manage.modules.roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        try {
            $this->validator->with($inputs)->passesOrFail(RoleValidator::RULE_CREATE);
            $inputs['guard_name'] = $this->repository->guard_name;
            DB::beginTransaction();
            $role = $this->repository->create($inputs);
            $role->syncPermissions($request->input('permission'));
            DB::commit();
            return redirect()->route('manage.roles.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput($inputs);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => __('Create role is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $role = $this->repository->find($id);
        $rolePermissions = app(PermissionRepository::class)->getDetailRolePermission($id);
        return view('manage.modules.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = $this->repository->find($id);
        $permission = app(PermissionRepository::class)->getListPermission();
        $rolePermissions = $this->repository->getRolePermissions($id);
        return view('manage.modules.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        try {
            $this->validator->setId($id);
            $this->validator->with($inputs)->passesOrFail(RoleValidator::RULE_UPDATE);
            DB::beginTransaction();
            $role = $this->repository->update($inputs, $id);
            $role->syncPermissions($request->input('permission'));
            DB::commit();
            return redirect()->route('manage.roles.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput($inputs);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => __('Update role is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $role = $this->repository->find($id);
        if (empty($role)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            \DB::beginTransaction();
            $role->delete();
            \DB::commit();
            return response()->json([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return response()->json([
            'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }

}
