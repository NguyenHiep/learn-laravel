<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\FrontendController;
use App\Repositories\CustomerRepository;
use App\Repositories\OrderRepository;

class CustomerController extends FrontendController
{
    protected $customerRepository;
    protected $orderRepository;

    public function __construct(
        CustomerRepository $customerRepository,
        OrderRepository $orderRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $customerId = auth()->id() ?? 0;
        $customer = $this->customerRepository->getCustomerInfo($customerId);
        $listOrders = $this->orderRepository->getOrderCustomer($customerId);
        $assignData = [
            'customer' => $customer,
            'listOrders' => $listOrders
        ];
        return view('frontend.theme-phiten.customers.index', $assignData);
    }

    public function orders()
    {
        $listOrders = $this->orderRepository->getOrderCustomer(auth()->id(), 0);
        $assignData = [
            'listOrders' => $listOrders
        ];
        return view('frontend.theme-phiten.customers.orders', $assignData);
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
