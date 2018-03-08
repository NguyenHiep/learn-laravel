<?php

namespace App\Http\Controllers;

use App\Model\Products;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class ComparesController extends FrontendController
{
    const MAX_ITEMS = 6;
    public $mproduct;

    public function __construct()
    {
        $this->mproduct = new Products();
    }

    /***
     * Show list product compare
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (Session::has(self::SES_ITEMS_COMPARE)) {
            $data['products'] = DB::table('products')
                ->whereIn('id', Session::get(self::SES_ITEMS_COMPARE))
                ->get();
            return view('frontend.theme-ecommerce.products.compare', $data);
        }
        return Redirect::route('home');
    }

    /***
     * Add product to compare
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $product_id = $request->query('product_id');
        $product    = $this->mproduct->getProductById($product_id);

        if (empty($product)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Data empty']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }
        if (Session::has(self::SES_ITEMS_COMPARE)) {
            $total_items = count(Session::get(self::SES_ITEMS_COMPARE)) + 1;
        } else {
            $total_items = 1;
        }

        if ($total_items <= self::MAX_ITEMS) {
            if (Session::get(self::SES_ITEMS_COMPARE) && in_array($product_id, Session::get(self::SES_ITEMS_COMPARE))) {
                return response()->json([
                    'message' => __('system.message.errors', ['errors' => $product->name . ' đã tồn tại']),
                    'status'  => self::CTRL_MESSAGE_ERROR,
                ]);
            } else {
                Session::push(self::SES_ITEMS_COMPARE, $product_id);
                return response()->json([
                    'message'     => __('system.message.errors', ['errors' => $product->name . ' đã được thêm vào so sánh']),
                    'status'      => self::CTRL_MESSAGE_INFO,
                    'total_items' => $total_items
                ]);
            }
        } else {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'So sánh tối đa ' . self::MAX_ITEMS . ' sản phẩm']),
                'status'  => self::CTRL_MESSAGE_WARNING,
            ]);
        }
    }

    /***
     * Remove product in compare
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(Request $request)
    {
        if (!Session::has(self::SES_ITEMS_COMPARE)) {
            return response()->json([
                'message'     => __('system.message.errors', ['errors' => 'Please add product to compare']),
                'status'      => self::CTRL_MESSAGE_WARNING,
            ]);
        }
        $product_id = $request->query('product_id');
        $product    = $this->mproduct->getProductById($product_id);
        if (empty($product)) {
            return response()->json([
                'message' => __('system.message.errors', ['errors' => 'Data empty']),
                'status'  => self::CTRL_MESSAGE_ERROR,
            ]);
        }

        if(in_array($product_id, Session::get(self::SES_ITEMS_COMPARE))){
            foreach (Session::get(self::SES_ITEMS_COMPARE) as $key => $item){
                if($item == $product_id){ // Nếu giá trị bằng nhau thì remove item ra khỏi mảng
                    Session::forget(self::SES_ITEMS_COMPARE.'.'.$key); // Delete item in session arrray
                    $total_items = count(Session::get(self::SES_ITEMS_COMPARE)); // Xóa xong đếm còn bao nhiêu phần tử
                    if ($total_items <= 0) {
                        Session::pull(self::SES_ITEMS_COMPARE);
                    }
                    return response()->json([
                        'message'  => __('system.message.errors', ['errors' => $product->name . ' đã được xóa']),
                        'status'   => self::CTRL_MESSAGE_INFO,
                        'redirect' => route('compare.index')
                    ]);
                }
            }
        }
        return response()->json([
            'message'     => __('system.message.errors', ['errors' => $product->name . ' không tồn tại']),
            'status'      => self::CTRL_MESSAGE_ERROR,
        ]);
    }


}