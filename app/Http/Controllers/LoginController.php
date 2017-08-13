<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth; //Add thang nay vao de su dung cho Auth
class LoginController extends Controller
{
    public function getlogin()
    {
        if (!Auth::check()) {
            return view('manage.login.login');
        } else {
            return redirect()->route('manage');
        }

    }

    /**
     *
     * @param LoginRequest $request
     */
    public function postlogin(LoginRequest $request)
    {
        //Khai bao tham so khi login
        $login = [
            'username' => $request->txtUser,
            'password' => $request->txtPass,
            'level'    => 1
        ];
        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect()->route('manage');

        } else {
            return redirect()->back();
        }

    }

    public function getlogout()
    {
        Auth::logout();
        return redirect()->route('getlogin');
    }
}
