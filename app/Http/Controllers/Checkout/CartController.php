<?php

namespace App\Http\Controllers\Checkout;

use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Http\Controllers\FrontendController;
use App\Helpers\Cart;

class CartController extends FrontendController
{
    use Cart;
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
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
        $data = [
            'products'    => [],
            'total_price' => 0
        ];
        if (Session::has(config('define.SESSION_ITEMS_CART'))) {
            $cartItems = Session::get(config('define.SESSION_ITEMS_CART'));
            $data['products'] = $this->getListItemsCart($cartItems);
            $data['total_price'] = $this->getToTalPriceCart();
        }
        return view('frontend.theme-phiten.checkout.cart', $data);

    }

    /****
     * Add to cart item json
     *
     * @param Request $request
     * @return JsonResponse|RedirectResponse
     */
    public function add(Request $request)
    {
        $result = [
            'status'  => self::CTRL_MESSAGE_ERROR,
            'message' => ''
        ];

        if (!$request->isMethod('post')) {
            $result['message'] = __('system.message.errors', ['errors' => __('Method is not allow')]);
            return $this->responseJson($result);
        }

        $inputs = $request->all();
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            $result['message'] = $validator->messages();
            return $this->responseJson($result, 400);
        }

        $product_id = $inputs['product_id'];
        $product = $this->productRepository->getProductById($product_id);

        if (empty($product)) {
            $result['message'] = __('system.message.errors', ['errors' => __('Data empty')]);
            return $this->responseJson($result, 400);
        }

        $quantity = ((int)$inputs['quantity'] > 0) ? (int)$inputs['quantity'] : 1;
        $cartItems = Session::get(self::SES_ITEMS_CART);
        if (!empty($cartItems) && is_array($cartItems)) {
            foreach ($cartItems as $key => $cart_item) {
                if ((int)$cart_item['product_id'] === (int)$inputs['product_id']) {
                    // Check trùng nhau tăng số lượng lên 1
                    $quantity_item = $cart_item['quantity'] + $quantity;
                    Session::put(self::SES_ITEMS_CART . '.' . $key . '.quantity', $quantity_item);
                    return $this->responseJson([
                        'status'  => self::CTRL_MESSAGE_INFO,
                        'message' => __('system.message.info', ['message' => $product->name . ' đã được thêm vào giỏ hàng']),
                        'data' => [
                            'id'         => $product->id,
                            'slug'       => $product->slug,
                            'name'       => $product->name,
                            'pictures'   => asset(UPLOAD_PRODUCT . $product->pictures),
                            'sale_price' => $product->sale_price,
                            'quantity'   => $quantity_item
                        ]
                    ]);
                }
            }
        }
        Session::push(self::SES_ITEMS_CART, [
            'product_id' => $product_id,
            'quantity'   => $quantity,
        ]);
        return $this->responseJson([
            'status'  => self::CTRL_MESSAGE_INFO,
            'message' => __('system.message.info', ['message' => $product->name . ' đã được thêm vào giỏ hàng']),
            'data'    => [
                'id'         => $product->id,
                'slug'       => $product->slug,
                'name'       => $product->name,
                'pictures'   => asset(UPLOAD_PRODUCT . $product->pictures),
                'sale_price' => $product->sale_price,
                'quantity'   => $quantity,
            ]
        ]);
    }

    /***
     * Update cart item
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $input = $request->input('data', []);
        $request->validate([
            'data' => 'required|array|min:1'
        ]);
        if (Session::has(config('define.SESSION_ITEMS_CART'))) {
            foreach (Session::get(config('define.SESSION_ITEMS_CART')) as $key => $ses_item_cart) {
                $quantityItem = collect($input)->where('id',
                    $ses_item_cart['product_id'])->pluck('item_cart_quantity')->first();
                Session::put(self::SES_ITEMS_CART . '.' . $key . '.quantity', $quantityItem);
            }
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_INFO,
                'message' => __('system.message.info', ['message' => 'Cập nhật giỏ hàng thành công']),
                'data'    => [
                    'redirectUrl' => route('checkout.index')
                ]
            ]);
        }
        return $this->responseJson([
            'status'  => self::CTRL_MESSAGE_ERROR,
            'message' => __('system.message.errors', ['errors' => 'Item cart not exist']),
        ]);
    }

    /****
     * Remove item in cart
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function remove(Request $request)
    {
        $result = [
            'status'  => self::CTRL_MESSAGE_ERROR,
            'message' => ''
        ];

        // Check method
        if (!$request->isMethod('post')) {
            $result['message'] = __('system.message.errors', ['errors' => __('Method is not allow')]);
            return $this->responseJson($result);
        }

        if (!Session::has(self::SES_ITEMS_CART)) {
            $result['status'] = self::CTRL_MESSAGE_WARNING;
            $result['message'] = __('system.message.info', ['message' => __('Please add product to cart')]);
            return $this->responseJson($result);
        }

        $inputs = $request->all();
        $product_id = $inputs['product_id'];
        $product = $this->productRepository->getProductById($product_id);
        if (empty($product)) {
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_ERROR,
                'message' => __('system.message.info', ['message' => __('Product not found')])
            ]);
        }

        foreach (Session::get(self::SES_ITEMS_CART) as $key => $item) {
            if ($item['product_id'] == $product_id) { // Nếu giá trị bằng nhau thì remove item ra khỏi mảng
                Session::forget(self::SES_ITEMS_CART . '.' . $key); // Delete item in session arrray
                $total_items = count(Session::get(self::SES_ITEMS_CART)); // Xóa xong đếm còn bao nhiêu phần tử
                if ($total_items == 0) {
                    Session::pull(self::SES_ITEMS_CART);
                    return response()->json([
                        'status'  => self::CTRL_MESSAGE_INFO,
                        'message' => __('system.message.info', ['message' => $product->name . ' đã được xóa']),
                        'data'    => [
                            'redirect' => route('checkout.cart.index')
                        ]
                    ]);
                }
                return $this->responseJson([
                    'status'  => self::CTRL_MESSAGE_INFO,
                    'message' => __('system.message.info', ['message' => $product->name . ' đã được xóa']),
                ]);
            }
        }
        return $this->responseJson([
            'status'  => self::CTRL_MESSAGE_ERROR,
            'message' => __('system.message.errors', ['message' => $product->name . ' không tồn tại']),
        ]);

    }

    /****
     * Remove all cart item
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function removeAll(Request $request)
    {
        // Check method
        if (!$request->isMethod('post')) {
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_ERROR,
                'message' => __('system.message.errors', ['errors' => 'Method is not allow']),
            ]);
        }
        if (!Session::has(self::SES_ITEMS_CART)) {
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_WARNING,
                'message' => __('system.message.info', ['message' => 'Please add product to cart']),
            ]);
        }

        $inputs = $request->all();
        $delete_all = $inputs['delete_all'];
        if ($delete_all) {
            Session::pull(self::SES_ITEMS_CART);
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_INFO,
                'message' => __('system.message.info', ['message' => 'Giỏ hàng đã được xóa']),
                'data'    => [
                    'redirect' => route('checkout.cart.index')
                ]
            ]);
        }

        if (!Session::has(self::SES_ITEMS_CART)) {
            return $this->responseJson([
                'status'  => self::CTRL_MESSAGE_ERROR,
                'message' => __('system.message.errors', ['errors' => 'Delete all items cart error']),
            ]);
        }

    }

    /***
     * Get list item in cart
     *
     * @return JsonResponse
     */
    public function getListItem()
    {
        $result = [
            'status'  => self::CTRL_MESSAGE_SUCCESS,
            'message' => __('Get item successfully!'),
            'data'    => [
                'products'    => [],
                'total_price' => 0
            ]
        ];
        if (Session::has(config('define.SESSION_ITEMS_CART'))) {
            $cartItems = Session::get(config('define.SESSION_ITEMS_CART'));
            $result['data'] = [
                'products'    => $this->getListItemsCart($cartItems),
                'total_price' => $this->getToTalPriceCart()
            ];
        }
        return $this->responseJson($result);
    }

}