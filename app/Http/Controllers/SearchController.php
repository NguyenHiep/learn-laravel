<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Helppers\ToolbarConfig;

class SearchController extends FrontendController
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
    
    public function index(Request $request)
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
        $data['products'] = $this->mproduct->search($this->config_toolbar, $request->all());
        return view('frontend.theme-ecommerce.search', $data);
    }
}
