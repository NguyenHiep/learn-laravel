<?php

namespace App\Http\Controllers\Auth;

use App\Entities\Customer;
use App\Http\Controllers\FrontendController;
use App\Jobs\SendEmail;
use App\Repositories\CustomerRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/customer';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $userName;

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Set default value
        $data['status'] = config('define.STATUS_ENABLE');
        $data['gender'] = 2; // Default is Female
        $data['username'] = generate_username($data['first_name'], $data['last_name']);
        $this->userName = $data['username'];
        return Validator::make($data, [
            'first_name'  => 'required|string|max:191',
            'last_name'   => 'required|string|max:191',
            'username'    => 'required|string|max:191|unique:customers',
            'password'    => 'required|string|min:6|max:191|confirmed',
            'phone'       => 'required|max:20',
            'email'       => 'required|max:191|email|unique:customers',
            'gender'      => 'required|integer|min:1|max:2',
            'birthday'    => 'nullable|date|date_format:Y-m-d',
            'address'     => 'nullable|string|max:1000',
            'city_id'     => 'nullable|integer|min:0',
            'district_id' => 'nullable|integer|min:0',
            'status'      => 'required|integer|min:1|max:2',
            'captcha'     => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Customer
     */
    protected function create(array $data)
    {
        // Set default value
        $data['status'] = config('define.STATUS_ENABLE');
        $data['gender'] = 2; // Default is Female
        $data['password'] = bcrypt($data['password']);
        $data['username'] = $this->userName;
        if (isset($data['captcha'])) {
            $data = array_except($data, 'captcha');
        }
        return app(CustomerRepository::class)->createCustomer($data);
    }

    /****
     * Custom show register
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        abort(404);
    }

    /**
     * The user has been registered.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        // Send email register
        $settings = app(SettingRepository::class)->getSettings();
        $user->password = $request->password;
        $emailInfo = [
            'subject'   => 'Xác nhận đăng ký tài khoản',
            'from'      => $settings->email1,
            'from_name' => $settings->email1_name,
            'recipient' => $user->email,
            'content'   => ['user' => $user]
        ];
        $this->dispatch(new SendEmail($emailInfo, 'emails.customers.register'));
        return $this->responseJson([
            'status'  => true,
            'message' => __('Action completed.'),
            'data'    => array_merge($user->toArray(), ['redirectUrl' => url()->previous()])
        ], 201);
    }
}
