<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use App\Helpers\ToolbarConfig;
use App\Model\Products;

class CategoriesController extends FrontendController
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

    public function show($slug){
        $category = $this->mcategory->getCategoryBySlug($slug);
        if(empty($category))
        {
            abort(404);
        }
        // Get config toolbar
        $data['mode']       = $this->config_toolbar->mode;
        // Get product list
        $data['category']   = $category;
        $data['products']   = $this->mproduct->getProductByCategoryId($this->config_toolbar, $category->id);
        $data['categories'] = $this->mcategory->getListCategory();
        return view('frontend.theme-ecommerce.catagories.show', $data);
    }
}
