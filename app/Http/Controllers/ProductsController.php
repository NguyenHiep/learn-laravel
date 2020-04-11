<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Helpers\ToolbarConfig;

class ProductsController extends FrontendController
{
    public $mcategory;
    public $mproduct;
    public $config_toolbar;

    public function __construct(Categories $categories, Products $products)
    {
        $this->mcategory      = $categories;
        $this->mproduct       = $products;
        $this->config_toolbar = ToolbarConfig::getInstance();
    }

    public function promotion(Request $request)
    {
        $rules = [
            'price_from' => 'nullable|integer',
            'price_to'   => 'nullable|integer|gte:price_from',
            'stocks'     => 'nullable|array',
            'sizes'      => 'nullable|array',
            'brands'     => 'nullable|array',
            'colors'     => 'nullable|array',
        ];
        $this->validate($request, $rules);
        $data['mode']       = $this->config_toolbar->mode;
        $data['products']   = $this->mproduct->getPromotionProducts($this->config_toolbar, $request->all());
        $data['categories'] = $this->mcategory->getListCategory();
        return view('frontend.theme-ecommerce.products.promotion', $data);
    }

    public function show($slug){
        $product = $this->mproduct->getProductBySlug($slug);
        if (empty($product)) {
            abort(404);
        }
        // Get related product
        $listRelated = $this->mproduct->getRelatedProducts($product->id);
        $assignData = [
            'product'         => $product,
            'product_related' => $listRelated
        ];
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
        return response()->view('frontend.theme-ecommerce.products.quickview', ['product' => $product], 200)
                         ->header('Content-Type', 'text/html');

    }

}
