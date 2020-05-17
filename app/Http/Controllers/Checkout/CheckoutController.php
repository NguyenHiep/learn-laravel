<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Requests\CheckoutRequest;
use App\Model\Orders;
use App\Model\Products;
use Carbon\Carbon;
use Session;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\DB;
use Log;
use App\Helpers\Cart;

class CheckoutController extends FrontendController
{
    use Cart;
    const STATUS_INPROCESS   = 1;
    const DELIVERY_TYPE_SAME = 1;

    public function index()
    {
        if (!Session::has(self::SES_ITEMS_CART)) {
            return redirect()->route('home');
        }
        $data = [];
        $this->payment_options = [
            [
                'id'          => 1,
                'name'        => 'Thanh toán online',
                'description' => 'Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.'
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
                'name'        => 'Thanh toán khi nhận hàng',
                'description' => 'Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.'
            ],
        ];
        $data['payment_options'] = $this->payment_options;
        // Get and set item cart to list
        $cartItems = Session::get(self::SES_ITEMS_CART);
        $data['products'] = $this->getListItemsCart($cartItems);
        $data['total_price'] = $this->getToTalPriceCart();

        return view('frontend.theme-phiten.checkout.index', $data);
    }

    public function save(CheckoutRequest $request)
    {
        if (!Session::has(self::SES_ITEMS_CART)) {
            return redirect()->route('home');
        }
        // Get and set item cart to list
        $cartItems = Session::get(self::SES_ITEMS_CART);
        $data['products']    = $this->getListItemsCart($cartItems);
        $data['total_price'] = $this->getToTalPriceCart();

        $inputs = $request->all();
        $inputs['ordered_at']   = Carbon::now()->toDateTimeString();
        $inputs['delivered_at'] = Carbon::now()->toDateTimeString();
        $inputs['status']       = static::STATUS_INPROCESS;
        $inputs['sub_total']    = $data['total_price'];
        $inputs['total']        = $data['total_price'];
        // Code xử lý product
        try {
            DB::beginTransaction();
            // Save order
            $order            = new Orders();
            $order->fill($inputs)->save();

            // Process deliveries
            // Địa chỉ nhận hàng cùng với địa chỉ mua
            $inputs['order_id'] = $order->id;
            if (!isset($inputs['delivery_type'])) {
                $inputs['delivery_type'] = static::DELIVERY_TYPE_SAME;
            }

            if($inputs['delivery_type'] == static::DELIVERY_TYPE_SAME)
            {
                $inputs['buyer_email']        = $inputs['receiver_email'];
                $inputs['buyer_name']         = $inputs['receiver_name'];
                $inputs['buyer_address_type'] = $inputs['receiver_address_type'];
                $inputs['buyer_address']      = $inputs['receiver_address_1'];
                $inputs['buyer_address_2']    = $inputs['receiver_address_2'];
                $inputs['buyer_phone_1']      = $inputs['receiver_phone_1'];
            }

            $order_deliveries = new Orders\Deliveries();
            $order_deliveries->fill($inputs);
            $order_deliveries->save();
            // Process products
            $list_product = [];

            foreach ($data['products'] as $key => $product)
            {
                $list_product[$key]['order_id']   = $order->id;
                $list_product[$key]['product_id'] = $product->id;
                $list_product[$key]['name']       = $product->name;
                $list_product[$key]['sku']        = $product->sku;
                $list_product[$key]['price']      = $product->price;
                $list_product[$key]['sale_price'] = $product->sale_price;
                $list_product[$key]['quantity']   = $product->item_cart_quantity;
                $list_product[$key]['created_at'] = Carbon::now()->toDateTimeString();
                $list_product[$key]['updated_at'] = Carbon::now()->toDateTimeString();
            }
            $order_products   = new Orders\Products();
            $order_products::insert($list_product);
            DB::commit();
            return redirect()->route('checkout.thanks')->with([
                'message' => __('Đặt hàng thành công'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create order is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);


    }

    public function thanks()
    {
        if (Session::has(self::SES_ITEMS_CART)) {
            Session::forget(self::SES_ITEMS_CART);
        }
        return view('frontend.theme-ecommerce.checkout.thanks');
    }
}