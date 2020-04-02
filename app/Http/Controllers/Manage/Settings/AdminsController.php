<?php

namespace App\Http\Controllers\Manage\Settings;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Repositories\UserRepository;

class AdminsController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
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
            $comments = $this->repository->getListUser();
            $dataTables = new UsersDataTable($comments);
            return $dataTables->getTransformerData();
        }
        $fields = [
            'id' => [
                'label' => __('common.settings.admins.id')
            ],
            'username' => [
                'label' => __('common.settings.admins.username')
            ],
            'email' => [
                'label' => __('common.settings.admins.email')
            ],
            'level' => [
                'label' => __('common.settings.admins.level')
            ],
            'status' => [
                'label' => __('common.settings.admins.status')
            ],
            'actions' => [
                'label'      => __('common.settings.admins.actions'),
                'searchable' => false,
                'orderable'  => false,
            ]
        ];
        $dtColumns = UsersDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.modules.settings.admins.index')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.modules.settings.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // Begin validate
        $this->validate(request(),
            [
                'avatar'   => 'required|mimes:jpeg,jpg,png|max:1000',
                'username' => 'required',
                'password' => 'required',
                'level'    => 'required',
                'status'   => 'required'
            ]
        );
        // Begin upload avatar image
        $user_info = new User();
        if (request()->hasFile('avatar')) {
            $filename = request()->file('avatar')->getClientOriginalName();
            //$filesize = request()->file()->getClientSize();
            request()->file('avatar')->storeAs(UPLOAD_USER_ADMIN, $filename);
            $user_info->avatar = $filename;
        }
        //$input                = request()->all();
        $user_info->username    = request()->username;
        $user_info->password    = bcrypt(request()->password);
        $user_info->level       = request()->level;
        $user_info->status      = request()->status;
        $user_info->save();
        session()->flash('message', __('system.message.create'));
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('manage.modules.settings.admins.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //Get user info
        $user = User::findOrFail($id);
        // Begin validate
        $this->validate(request(),
            [
                'username' => 'required',
                'level'    => 'required',
                'status'   => 'required'
            ]
        );

        // If password empty remove password
        if (!empty(request()->password)) {
            $user->password    = bcrypt(request()->password);
        }

        if (request()->hasFile('avatar')) {
            $filename = request()->file('avatar')->getClientOriginalName();
            //$filesize = request()->file()->getClientSize();
            request()->file('avatar')->storeAs(UPLOAD_USER_ADMIN, $filename);
            $user->avatar = $filename;
        }

        $user->username    = request()->username;
        $user->level       = request()->level;
        $user->status      = request()->status;
        $user->save();

        session()->flash('message', __('system.message.update'));
        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
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
            \Log::error([$e->getMessage(), __METHOD__]);
        }
        return response()->json([
            'message' => __('system.message.errors', ['errors' => $e->getMessage()]),
            'status'  => self::CTRL_MESSAGE_ERROR
        ]);
    }

}
