<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Requests\CheckoutRequest;
use App\Model\Orders;
use App\Repositories\CustomerRepository;
use App\Repositories\LocationRepository;
use App\Repositories\ProvinceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\DB;
use Log;
use App\Helpers\Cart;

class CheckoutController extends FrontendController
{
    use Cart;

    const ORDER_IN_PROCESS = 4;
    const DELIVERY_TYPE_SAME = 1;

    public function index()
    {
        if (!Session::has(self::SES_ITEMS_CART)) {
            return redirect()->route('home');
        }
        $data = [];
        $paymentOptions = [
            [
                'id'          => 1,
                'name'        => 'Thanh toán khi nhận hàng',
                'description' => 'Nhận hàng thanh toán'
            ],
            [
                'id'          => 2,
                'name'        => 'Chuyển khoản ngân hàng',
                'description' => 'Thông tin tài khoản 
                                Họ và tên: Nguyễn Minh Hiệp 
                                Số tài khoản: 0751 0000 14244 
                                Ngân hàng: VietCombank 
                                Chi nhánh: Phú Yên 
                                Số Điện Thoại: 0167 6542 578 Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển..'
            ],
            [
                'id'          => 3,
                'name'        => 'Thanh toán online',
                'description' => 'Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.'
            ],
        ];
        $data['paymentOptions'] = $paymentOptions;
        // Get and set item cart to list
        $cartItems = Session::get(self::SES_ITEMS_CART);
        $data['products'] = $this->getListItemsCart($cartItems);
        $data['total_price'] = $this->getToTalPriceCart();
        $locations = app(LocationRepository::class)->getListLocation();
        $data['locations'] = $locations;
        $provinces = [];
        if ($locations->isNotEmpty()) {
            $provinces = app(ProvinceRepository::class)->getListProvinceByLocationId($locations->first()->code);
        }
        $data['provinces'] = $provinces;
        $customerId = auth()->id() ?? 0;
        $data['customer'] = app(CustomerRepository::class)->getCustomerInfo($customerId);
        return view('frontend.theme-phiten.checkout.index', $data);
    }

    /****
     * Checkout cart
     *
     * @param CheckoutRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function save(CheckoutRequest $request)
    {
        if (!Session::has(self::SES_ITEMS_CART)) {
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_ERROR,
                'message' => __('system.message.errors', ['errors' => 'Please selected item product']),
            ]);
        }
        // Validate data input
        $inputs = $request->validationData();
        // Get and set item cart to list
        $cartItems = Session::get(self::SES_ITEMS_CART);
        $data['products'] = $this->getListItemsCart($cartItems);
        $data['total_price'] = $this->getToTalPriceCart();
        $inputs['ordered_at'] = Carbon::now()->toDateTimeString();
        $inputs['delivered_at'] = Carbon::now()->toDateTimeString();
        $inputs['status'] = static::ORDER_IN_PROCESS;
        $inputs['sub_total'] = $data['total_price'];
        $inputs['total'] = $data['total_price'];
        $inputs['customer_id'] = auth()->id() ?? 0;
        // Code xử lý product
        try {
            DB::beginTransaction();
            // Save order
            $order = new Orders();
            $order->fill($inputs)->save();

            // Process deliveries
            // Địa chỉ nhận hàng cùng với địa chỉ mua
            $inputs['order_id'] = $order->id;
            if (!isset($inputs['delivery_type'])) {
                $inputs['delivery_type'] = static::DELIVERY_TYPE_SAME;
            }

            if ($inputs['delivery_type'] == static::DELIVERY_TYPE_SAME) {
                $inputs['buyer_email'] = $inputs['receiver_email'];
                $inputs['buyer_name'] = $inputs['receiver_name'];
                $inputs['buyer_address_type'] = $inputs['receiver_address_type'];
                $inputs['buyer_address'] = $inputs['receiver_address_1'];
                $inputs['buyer_address_2'] = $inputs['receiver_address_2'] ?? null;
                $inputs['buyer_phone_1'] = $inputs['receiver_phone_1'];
            }

            $order_deliveries = new Orders\Deliveries();
            $order_deliveries->fill($inputs);
            $order_deliveries->save();
            // Process products
            $list_product = [];

            foreach ($data['products'] as $key => $product) {
                $list_product[$key]['order_id'] = $order->id;
                $list_product[$key]['product_id'] = $product->id;
                $list_product[$key]['name'] = $product->name;
                $list_product[$key]['sku'] = $product->sku;
                $list_product[$key]['price'] = $product->price;
                $list_product[$key]['sale_price'] = $product->sale_price;
                $list_product[$key]['quantity'] = $product->item_cart_quantity;
                $list_product[$key]['created_at'] = Carbon::now()->toDateTimeString();
                $list_product[$key]['updated_at'] = Carbon::now()->toDateTimeString();
            }
            $order_products = new Orders\Products();
            $order_products::insert($list_product);
            Session::flash('orderId', $order->id);
            //TODO: Send mail order
            DB::commit();
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_SUCCESS,
                'message' => __('Đặt hàng thành công'),
                'data'    => [
                    'redirectUrl' => route('checkout.thanks')
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return $this->responseJson([
            'status'  => self::CTRL_MESSAGE_ERROR,
            'message' => __('system.message.errors', ['errors' => 'Create order is failed']),
        ]);
    }

    /***
     * Show page thanks after checkout cart successfully
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function thanks()
    {
        if (!Session::has(self::SES_ITEMS_CART)) {
            return redirect()->route('home');
        }
        if (Session::has(self::SES_ITEMS_CART)) {
            Session::forget(self::SES_ITEMS_CART);
        }
        return view('frontend.theme-phiten.checkout.thanks');
    }

    public function getState(Request $request)
    {
        $id = $request->input('id', 0);
        if (empty($id)) {
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_SUCCESS,
                'message' => __('Action completed.'),
                'data'    => [
                    'listState' => []
                ]
            ]);
        }
        $listState = app(ProvinceRepository::class)->getListProvinceByLocationId($id);
        return $this->responseJson([
            'status'  => self::CTRL_MESSAGE_SUCCESS,
            'message' => __('Action completed.'),
            'data'    => [
                'listState' => $listState
            ]
        ]);
    }
}