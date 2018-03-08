<?php

namespace App\Http\Controllers;

use App\Helppers\ToolbarConfig;
use App\Model\Sliders;
use App\Model\Products;

class HomeController extends FrontendController
{
    const THOITRANG_NAM     = 2;
    const THOITRANG_NU      = 3;
    const THOITRANG_CHOBE   = 4;
    const PHUKIEN_THOITRANG = 5;
    public $mslider;
    public $mproduct;
    public $config_toolbar;

    public function __construct()
    {
        $this->mslider        = new Sliders();
        $this->mproduct       = new Products();
        $this->config_toolbar = ToolbarConfig::getInstance();
        $this->config_toolbar->limit = 8;
    }

    public function index(){

        $data['sliders']           = $this->mslider->getListSlider();
        $data['tabs']              = [
            [
                'title' => 'Sản phẩm bán chạy nhất',
                'items' => $this->mproduct->getRandomProducts()
            ],
            [
                'title' => 'Sản phẩm mới về',
                'items' => $this->mproduct->getProductByCategoryId($this->config_toolbar, static::THOITRANG_NAM)
            ],

        ];
        $data['thoitrang_nu']      = $this->mproduct->getProductByCategoryId($this->config_toolbar, static::THOITRANG_NU);
        $data['thoitrang_nam']     = $this->mproduct->getProductByCategoryId($this->config_toolbar,static::THOITRANG_NAM);
        $data['thoitrang_chobe']   = $this->mproduct->getProductByCategoryId($this->config_toolbar,static::THOITRANG_CHOBE);
        $data['phukien_thoitrang'] = $this->mproduct->getProductByCategoryId($this->config_toolbar,static::PHUKIEN_THOITRANG);
    	return view('frontend.theme-ecommerce.home', $data);
    }

}
