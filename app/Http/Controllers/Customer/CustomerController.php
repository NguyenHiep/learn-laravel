<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\FrontendController;
use App\Http\Requests\ProfileRequest;
use App\Repositories\CustomerRepository;
use App\Repositories\LocationRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProvinceRepository;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Log;

class CustomerController extends FrontendController
{

    const ORDER_STATUS_CANCEL = 1;

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
        $customer = $this->customerRepository->getCustomerInfo(auth()->id());
        $locations = app(LocationRepository::class)->getListLocation();
        $locationId = $customer->city_id ?? 0;
        if (empty($locationId)) {
            $locationId = $locations->first()->code;
        }
        $provinces = app(ProvinceRepository::class)->getListProvinceByLocationId($locationId);
        $assignData = [
            'customer'  => $customer,
            'locations' => $locations,
            'provinces' => $provinces
        ];
        return view('frontend.theme-phiten.customers.profile', $assignData);
    }

    /***
     * update profile customer
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->validationData();
            $customer = $this->customerRepository->find(auth()->id());
            if (empty($inputs['password'])) {
                $inputs = Arr::except($inputs, ['password']);
            } else {
                $inputs['password'] = bcrypt($inputs['password']);
            }
            $customer->fill($inputs)->save();
            DB::commit();
            return redirect()->route('customer.profile')->with([
                'status'  => self::CTRL_MESSAGE_SUCCESS,
                'message' => __('Action completed.')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->with([
            'status'  => self::CTRL_MESSAGE_ERROR,
            'message' => __('system.message.errors', ['errors' => 'Update profile failed!']),
        ]);
    }

    /****
     * Cancel order by customer
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function cancel($id)
    {
        $order = $this->orderRepository->findWhere([
            'id'          => $id,
            'customer_id' => auth()->id()
        ], ['id', 'customer_id', 'status'])->first();
        if (empty($order)) {
            return abort(404);
        }
        try {
            DB::beginTransaction();
            $order->update(['status' => self::ORDER_STATUS_CANCEL]);
            DB::commit();
            return redirect()->route('customer.orders')->with([
                'status'  => self::CTRL_MESSAGE_SUCCESS,
                'message' => __('Action completed.')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }

        return redirect()->back()->with([
            'status'  => self::CTRL_MESSAGE_ERROR,
            'message' => __('system.message.errors', ['errors' => 'Cancel order failed!']),
        ]);
    }
}
