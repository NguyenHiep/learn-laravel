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
    
    public function index()
    {
        $data['products'] = $this->mproduct->search($this->config_toolbar);
        return view('frontend.theme-ecommerce.search', $data);
    }
}
