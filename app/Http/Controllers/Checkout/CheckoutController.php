<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Requests\CheckoutRequest;
use App\Model\Orders;
use App\Model\Products;
use Carbon\Carbon;
use Session;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Helppers\Cart;

class CheckoutController extends FrontendController
{
    use Cart;
    const STATUS_INPROCESS = 1;

    public function index()
    {
        if (!Session::has(self::SES_ITEMS_CART)) {
            return redirect()->route('home');
        }
        $data        = [];
        $this->payment_options = [
            [
                'id'          => 1,
                'name'        => 'Thanh toán qua paypal',
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
                'name'        => 'Trả tiền mặt khi nhận hàng',
                'description' => '3Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.'
            ],
        ];
        $data['payment_options'] = $this->payment_options;
        // Get and set item cart to list
        $cartItems = Session::get(self::SES_ITEMS_CART);
        $data['products']    = $this->getListItemsCart($cartItems);
        $data['total_price'] = $this->getToTalPriceCart();

      return view('frontend.theme-ecommerce.checkout.checkout', $data);
    }

    public function save(CheckoutRequest $request)
    {
        $inputs = $request->all();

        $inputs['ordered_at']   = Carbon::now()->toDateTimeString();
        $inputs['delivered_at'] = Carbon::now()->toDateTimeString();
        $inputs['status']       = static::STATUS_INPROCESS;
        // Code xử lý product
        try {
            DB::beginTransaction();
            // Save order
            $order            = new Orders();
            $order->fill($inputs)->save();

            $order_deliveries = new Orders\Deliveries();
            $order_products   = new Orders\Products();
            DB::commit();
            return redirect()->route('products.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create order is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);


    }


}