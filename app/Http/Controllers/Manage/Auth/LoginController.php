<?php

namespace App\Http\Controllers\Manage\Auth;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{

    const CTRL_MESSAGE_SUCCESS = "success";
    const CTRL_MESSAGE_ERROR = "error";

    /**
     * This trait has all the login throttling functionality.
     */
    use ThrottlesLogins;

    /**
     * Max login attempts allowed.
     */
    public $maxAttempts = 5;
    /**
     * Number of minutes to lock the login.
     */
    public $decayMinutes = 3;

    /**
     * Only guests for "user" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    /**
     * Username used in ThrottlesLogins trait
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }


    /**
     * Show the login form.
     *
     * @return Factory|View
     */
    public function showLoginForm()
    {
        return view('manage.auth.login');
    }

    /**
     * Login the admin.
     *
     * @param Request $request
     * @return void | RedirectResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $this->validator($request);
        //check if the user has too many login attempts.
        if ($this->hasTooManyLoginAttempts($request)) {
            //Fire the lockout event.
            $this->fireLockoutEvent($request);
            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }
        $request->input('status', 1); // The user is active, not suspended, and exists.
        //attempt login.
        if (Auth::guard('user')->attempt($request->only('email', 'password', 'status'), $request->filled('remember'))) {
            //Authenticated
            return redirect()->intended(route('manage.dashboard'))->with([
                'status'  => self::CTRL_MESSAGE_SUCCESS,
                'message' => __('You are Logged in as Admin!')
            ]);
        }
        //keep track of login attempts from the user.
        $this->incrementLoginAttempts($request);
        //Authentication failed
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('manage.login')->with([
            'status'  => self::CTRL_MESSAGE_SUCCESS,
            'message' => __('Admin has been logged out!')
        ]);
    }

    /**
     * Validate the form data.
     *
     * @param Request $request
     * @return
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:users|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];
        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];
        //validate the request.
        $request->validate($rules, $messages);
    }

    /**
     * Redirect back after a failed login.
     *
     * @return RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()->back()->withInput()->with([
            'status'  => self::CTRL_MESSAGE_ERROR,
            'message' => __('Login failed, please try again!')
        ]);
    }

    protected function guard()
    {
        return Auth::guard('user');
    }
}
