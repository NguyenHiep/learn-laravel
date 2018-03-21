<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Requests\CheckoutRequest;
use App\Model\Products;
use DB;
use Redirect;
use Session;
use App\Http\Controllers\FrontendController;

class CheckoutController extends FrontendController
{


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
        $ids         = [];
        $total_price = 0;
        $this->item_quantity = [];
        $cartItems = Session::get(self::SES_ITEMS_CART);
        if(!empty($cartItems)){
            foreach ($cartItems as $cartItem)
            {
                $ids[] = $cartItem['product_id'];
                $this->item_quantity[$cartItem['product_id']]['quantity'] = $cartItem['quantity'];
            }

            $products = DB::table('products')
                ->whereIn('id', $ids)
                ->get();

            foreach ($products as &$product){
                $product->item_cart_quantity =  $this->item_quantity[$product->id]['quantity'];
                $product->item_cart_sum      =  $product->item_cart_quantity * $product->price;
                $total_price                 += $product->item_cart_sum;
            }

            $data['products']    = $products;
            $data['total_price'] = $total_price;
        }

      return view('frontend.theme-ecommerce.checkout.checkout', $data);
    }

    public function save(CheckoutRequest $request)
    {

    }


}