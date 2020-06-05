<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\FrontendController;
use App\Repositories\CustomerRepository;

class CustomerController extends FrontendController
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        return view('frontend.theme-phiten.customers.index');
    }

    public function orders()
    {
        return view('frontend.theme-phiten.customers.orders');
    }

    public function detail()
    {
        return view('frontend.theme-phiten.customers.orders-detail');
    }

    public function reviews()
    {
        return view('frontend.theme-phiten.customers.reviews');
    }

    public function profile()
    {
        return view('frontend.theme-phiten.customers.profile');
    }

    public function cancel()
    {

    }
}
