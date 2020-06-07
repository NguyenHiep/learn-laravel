<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\FrontendController;
use App\Repositories\CustomerRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

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

    public function detail(int $id)
    {
        $order = $this->orderRepository->getOrderDetail($id);
        $assignData = [
            'order' => $order
        ];
        return view('frontend.theme-phiten.customers.orders-detail', $assignData);
    }

    public function reviews()
    {
        return view('frontend.theme-phiten.customers.reviews');
    }

    public function profile()
    {
        $customerId = auth()->id() ?? 0;
        $customer = $this->customerRepository->getCustomerInfo($customerId);
        $assignData = [
            'customer' => $customer
        ];
        return view('frontend.theme-phiten.customers.profile', $assignData);
    }

    public function update(Request $request)
    {

    }

    public function cancel(Request $request)
    {

    }
}
