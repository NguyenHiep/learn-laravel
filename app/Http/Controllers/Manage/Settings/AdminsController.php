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
		$list_user = User::paginate(10);

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

        User::create(request()->all());
        session()->flash('message', 'Thêm mới thành viên thành công!!');
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);

        return view('manage.modules.settings.admins.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
