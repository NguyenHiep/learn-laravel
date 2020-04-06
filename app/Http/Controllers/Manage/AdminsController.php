<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use DB;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('manage.modules.admins.create');
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
            $this->validator->with($inputs)->passesOrFail(UserValidator::RULE_CREATE);
            if ($request->hasFile('avatar')) {
                $pathAvatar = Storage::put(UPLOAD_USER_ADMIN, $request->file('avatar'));
                $inputs['avatar'] = $pathAvatar;
            }

            DB::beginTransaction();
            $this->repository->create($inputs);
            DB::commit();
            return redirect()->route('admins.index')->with([
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
            'message' => __('system.message.errors', ['errors' => __('Create user is failed')]),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->repository->find($id);
        return view('manage.modules.admins.edit', compact('user'));

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
            $this->validator->with($inputs)->passesOrFail(UserValidator::RULE_UPDATE);
            if (!empty($inputs['password'])) {
                $inputs['password'] = bcrypt($inputs['password']);
            }
            if ($request->hasFile('avatar')) {
                $pathAvatar = Storage::put(UPLOAD_USER_ADMIN, $request->file('avatar'));
                $inputs['avatar'] = $pathAvatar;
            }
            DB::beginTransaction();
            $this->repository->update($inputs, $id);
            DB::commit();
            return redirect()->route('admins.index')->with([
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
            'message' => __('system.message.errors', ['errors' => __('Update user is failed')]),
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
        $admin = User::find($id);
        if (empty($admin)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => __('common.not_found_id_delete')]),
                'status'  => self::CTRL_MESSAGE_ERROR
            ]);
        }

        try {
            \DB::beginTransaction();
            $admin->delete();
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
