<?php

namespace App\Http\Controllers\Manage\Settings;

use App\Http\Controllers\Controller;
use App\Model\User;

class AdminsController extends Controller
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
        // Get danh sách
        $list_user = User::orderBy('id', 'desc')->paginate(20);

        return view('manage.modules.settings.admins.index', compact('list_user'));
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
                'avatar'   => 'mimes:jpeg,jpg,png | max:1000',
                'username' => 'required',
                'password' => 'required',
                'level'    => 'required',
                'status'   => 'required'
            ],
            [
                'username.required' => 'Vui lòng nhập tên tài khoản',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'level.required'    => 'Vui lòng chọn cấp độ',
                'status.required'   => 'Vui lòng chọn trạng thái'
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
        session()->flash('message', 'Thêm mới thành viên thành công!!');
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
            ],
            [
                'username.required' => 'Vui lòng nhập tên tài khoản',
                'level.required'    => 'Vui lòng chọn cấp độ',
                'status.required'   => 'Vui lòng chọn trạng thái'
            ]
        );
        $input = request()->all();

        // If password empty remove password
        if (empty(request()->password)) {
            unset($input[ 'password' ]);
        } else {
            $input[ 'password' ] = bcrypt($input[ 'password' ]);
        }

        if (request()->hasFile('avatar')) {
            $filename = request()->file('avatar')->getClientOriginalName();
            //$filesize = request()->file()->getClientSize();
            request()->file('avatar')->storeAs(UPLOAD_USER_ADMIN, $filename);
            $user->avatar = $filename;
        }

        $user->update($input);
        session()->flash('message', 'Cập nhật thông tin tài khoản thành công!!');
        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->forcedelete();
        session()->flash('message', 'Xóa thông tin tài khoản thành công!!');
        return redirect()->route('admins.index');
    }

}
