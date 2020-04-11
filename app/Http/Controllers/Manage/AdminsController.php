<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use DB;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Log;
use Prettus\Validator\Exceptions\ValidatorException;
use Storage;

class AdminsController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        if (request()->ajax()) {
            $comments = $this->repository->getListUser();
            $dataTables = new UsersDataTable($comments);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id'       => [
                'label' => __('common.admins.id')
            ],
            'username' => [
                'label' => __('common.admins.username')
            ],
            'email'    => [
                'label' => __('common.admins.email')
            ],
            'level'    => [
                'label' => __('common.admins.level')
            ],
            'roles' => [
                'label'      => __('common.admins.roles'),
                'searchable' => false,
                'orderable'  => false

            ],
            'status'   => [
                'label' => __('common.admins.status')
            ],
            'actions'  => [
                'label'      => __('common.admins.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = UsersDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.admins.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $roles = app(RoleRepository::class)->getListRole()->pluck('name', 'name');
        return view('manage.modules.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        try {
            $this->validator->with($inputs)->passesOrFail(UserValidator::RULE_CREATE);
            if ($request->hasFile('avatar')) {
                $pathAvatar = Storage::put(UPLOAD_USER_ADMIN, $request->file('avatar'));
                $inputs['avatar'] = $pathAvatar;
            }

            DB::beginTransaction();
            $user = $this->repository->create($inputs);
            $user->assignRole($request->input('roles'));
            DB::commit();
            return redirect()->route('manage.admins.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput($inputs);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => __('Create user is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $user = $this->repository->find($id);
        $userRole = $user->roles->pluck('name', 'name')->all();
        $roles = app(RoleRepository::class)->getListRole()->pluck('name', 'name');
        return view('manage.modules.admins.edit', compact('user', 'roles', 'userRole'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        try {
            $this->validator->setId($id);
            $this->validator->with($inputs)->passesOrFail(UserValidator::RULE_UPDATE);
            if (!empty($inputs['password'])) {
                $inputs['password'] = bcrypt($inputs['password']);
            } else {
                $inputs = Arr::except($inputs, array('password'));
            }
            if ($request->hasFile('avatar')) {
                $pathAvatar = Storage::put(UPLOAD_USER_ADMIN, $request->file('avatar'));
                $inputs['avatar'] = $pathAvatar;
            }
            DB::beginTransaction();
            $user = $this->repository->update($inputs, $id);
            if (!in_array($request->input('roles'), $user->getRoleNames()->toArray())) {
                DB::table('model_has_roles')->where('model_id', $id)->delete();
                $user->assignRole($request->input('roles'));
            }
            DB::commit();
            return redirect()->route('manage.admins.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput($inputs);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => __('Update user is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        $admin = $this->repository->find($id);
        if (empty($admin)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            DB::beginTransaction();
            $admin->delete();
            DB::commit();
            return response()->json([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return response()->json([
            'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }

}
