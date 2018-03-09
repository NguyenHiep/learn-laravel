<?php

namespace App\Http\Controllers\Checkout;

use App\Model\Products;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
use App\Http\Controllers\FrontendController;

class CartController extends FrontendController
{
    public $mproduct;

    public function __construct()
    {
        $this->mproduct = new Products();
    }

    protected static function validator($data)
    {
        return Validator::make($data, [
            'product_id' => 'required|numeric',
            'quantity'   => 'required|numeric',
        ]);
    }

    public function index()
    {
        $data = [];
        if(Session::has(self::SES_ITEMS_CART)){
            $cartItems = Session::get(self::SES_ITEMS_CART);
            $ids = [];
            $total_price = 0;
            $this->item_quantity = [];
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
                    $total_price                 +=   $product->item_cart_sum;
                }

                $data['products']    = $products;
                $data['total_price'] = $total_price;
            }

        }
        return view('frontend.theme-ecommerce.checkout.cart', $data);

    }

    public function add(Request $request)
    {
        // Check method
        if (!$request->isMethod('post')) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Method is not allow']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }

        $inputs = $request->all();
        $validator = self::validator($inputs);
        // Validate
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $product_id = $inputs['product_id'];
        $product = $this->mproduct->getProductById($product_id);

        if (empty($product)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Data empty']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }

        if(isset($inputs['quantity'])){
            $quantity = (int) $inputs['quantity'];
        }else{
            $quantity = 1;
        }
        $total_items = 0;
        if (Session::has(self::SES_ITEMS_CART)) {
            $total_items = (int) count(Session::get(self::SES_ITEMS_CART));
        }

        $cartItems = Session::get(self::SES_ITEMS_CART);
        if ($cartItems) {
            foreach ($cartItems as $key => $cart_item){
                if($cart_item['product_id'] == $inputs['product_id']){

                    // Check trùng nhau tăng số lượng lên 1
                    $quantity_item = $cart_item['quantity'] + $quantity;
                    Session::put(self::SES_ITEMS_CART.'.'.$key.'.quantity', $quantity_item);
                    return response()->json([
                        'message'     => __('system.message.errors', ['errors' => $product->name . ' đã được thêm vào giỏ hàng']),
                        'status'      => self::CTRL_MESSAGE_INFO,
                        'total_items' => $total_items
                    ]);
                }
            }

            Session::push(self::SES_ITEMS_CART, [
                'product_id' => $product_id,
                'quantity'   => $quantity,
            ]);
            $total_items++;
            return response()->json([
                'message'     => __('system.message.errors', ['errors' => $product->name . ' đã được thêm vào giỏ hàng']),
                'status'      => self::CTRL_MESSAGE_INFO,
                'total_items' => $total_items
            ]);
        } else {
            Session::push(self::SES_ITEMS_CART, [
                'product_id' => $product_id,
                'quantity'   => $quantity,
            ]);
            $total_items++;
            return response()->json([
                'message'     => __('system.message.errors', ['errors' => $product->name . ' đã được thêm vào giỏ hàng']),
                'status'      => self::CTRL_MESSAGE_INFO,
                'total_items' => $total_items
            ]);
        }

    }

    public function edit()
    {

    }

    public function remove(Request $request)
    {
        // Check method
        if (!$request->isMethod('post')) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Method is not allow']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }
        if (!Session::has(self::SES_ITEMS_CART)) {
            return response()->json([
                'message'     => __('system.message.errors', ['errors' => 'Please add product to cart']),
                'status'      => self::CTRL_MESSAGE_WARNING,
            ]);
        }


        $inputs     = $request->all();
        $product_id = $inputs['product_id'];
        $product    = $this->mproduct->getProductById($product_id);
        if (empty($product)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Data not found']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }

        foreach (Session::get(self::SES_ITEMS_CART) as $key => $item){
            if($item['product_id'] == $product_id){ // Nếu giá trị bằng nhau thì remove item ra khỏi mảng
                Session::forget(self::SES_ITEMS_CART.'.'.$key); // Delete item in session arrray
                $total_items = count(Session::get(self::SES_ITEMS_CART)); // Xóa xong đếm còn bao nhiêu phần tử
                if ($total_items <= 0) {
                    Session::pull(self::SES_ITEMS_CART);
                    return response()->json([
                        'message'  => __('system.message.errors', ['errors' => $product->name . ' đã được xóa']),
                        'status'   => self::CTRL_MESSAGE_INFO,
                        'redirect' => route('checkout.cart.index')
                    ]);
                }
                return response()->json([
                    'message'  => __('system.message.errors', ['errors' => $product->name . ' đã được xóa']),
                    'status'   => self::CTRL_MESSAGE_INFO,
                ]);

            }
        }
        return response()->json([
            'message'     => __('system.message.errors', ['errors' => $product->name . ' không tồn tại']),
            'status'      => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    public function removeAll(Request $request){
        // Check method
        if (!$request->isMethod('post')) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Method is not allow']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }
        if (!Session::has(self::SES_ITEMS_CART)) {
            return response()->json([
                'message'     => __('system.message.errors', ['errors' => 'Please add product to cart']),
                'status'      => self::CTRL_MESSAGE_WARNING,
            ]);
        }

        $inputs = $request->all();
        $delete_all = $inputs['delete_all'];
        if($delete_all){
            Session::pull(self::SES_ITEMS_CART);
            return response()->json([
                'message'  => __('system.message.errors', ['errors' => 'Giỏ hàng đã được xóa']),
                'status'   => self::CTRL_MESSAGE_INFO,
                'redirect' => route('checkout.cart.index')
            ]);
        }

        if (!Session::has(self::SES_ITEMS_CART)) {
            return response()->json([
                'message'     => __('system.message.errors', ['errors' => 'Delete all items cart error']),
                'status'      => self::CTRL_MESSAGE_ERROR,
            ]);
        }

    }


}