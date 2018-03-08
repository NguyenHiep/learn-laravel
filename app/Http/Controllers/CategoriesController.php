<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use App\Helppers\ToolbarConfig;
use App\Model\Products;

class CategoriesController extends FrontendController
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

    public function show($slug){
        $category = $this->mcategory->getCategoryBySlug($slug);
        if(empty($category))
        {
            abort(404);
        }
        // Get config toolbar
        $config             = ToolbarConfig::getInstance();
        $data['mode']       = $config->mode;
        // Get product list
        $data['category']   = $category;
        $data['products']   = $this->mproduct->getProductByCategoryId($this->config_toolbar, $category->id);
        $data['categories'] = $this->mcategory->getListCategory();
        return view('frontend.theme-ecommerce.catagories.show', $data);
    }
}
