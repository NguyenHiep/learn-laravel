<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Helppers\ToolbarConfig;

class ProductsController extends FrontendController
{
    public $mcategory;
    public $mproduct;
    public $config_toolbar;

    public function __construct()
    {
        $this->mcategory      = new Categories();
        $this->mproduct       = new Products();
        $this->config_toolbar = ToolbarConfig::getInstance();
    }

    public function promotion()
    {
        $data['mode']       = $this->config_toolbar->mode;
        $data['products']   = $this->mproduct->getPromotionProducts($this->config_toolbar);
        $data['categories'] = $this->mcategory->getListCategory();
        return view('frontend.theme-ecommerce.products.promotion', $data);
    }

    public function show($slug){
        $product = $this->mproduct->getProductBySlug($slug);
        if(empty($product))
        {
            abort(404);
        }

        if(!empty($product->galary_img))
        {
            $product->galary_img = json_decode($product->galary_img);
        }

        $assignData = [ 'product' => $product ];
        return view('frontend.theme-ecommerce.products.detail', $assignData);
    }

    public function quick_view(Request $request)
    {
        $product_id = $request->query('product_id');
        $product    = $this->mproduct->getProductById($product_id);
        if (empty($product))
        {
            return response()->json([
                'status'  => self::CTRL_MESSAGE_ERROR,
                'message' => 'Product not found',
                'data'    => ''
            ]);
        }

        if(!empty($product->galary_img))
        {
            $product->galary_img = json_decode($product->galary_img);
        }

        return response()->view('frontend.theme-ecommerce.products.quickview', ['product' => $product], 200)
                         ->header('Content-Type', 'text/html');

    }

}
