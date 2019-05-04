<?php

namespace App\Http\Controllers;

use App\Helppers\ToolbarConfig;
use App\Model\Sliders;
use App\Model\Products;

class HomeController extends FrontendController
{
    const THOITRANG_NU      = 1;
    const THOITRANG_NAM     = 2;
    const THOITRANG_CHOBE   = 3;
    const PHUKIEN_THOITRANG = 4;
    public $mslider;
    public $mproduct;
    public $config_toolbar;

    public function __construct(Sliders $sliders, Products $products)
    {
        $this->mslider        = $sliders;
        $this->mproduct       = $products;
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
        //$data['section_display'] = ['hello','skill', 'experience', 'education','portfolio', 'feedback','contact'];
        return view('frontend.theme-ecommerce.home', $data);
    }

}
