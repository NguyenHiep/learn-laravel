<?php

namespace App\Http\Controllers;

use App\Model\Sliders;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    const THOITRANG_NAM     = 2;
    const THOITRANG_NU      = 3;
    const THOITRANG_CHOBE   = 4;
    const PHUKIEN_THOITRANG = 5;

    public function index(){

        $data['sliders']            = Sliders::where('slider_status', STATUS_ENABLE)->get();
        $data['products_random']    = $this->getRandomProducts();
        $data['thoitrang_nu']       = $this->getProductByCategoryId(static::THOITRANG_NU);
        $data['thoitrang_nam']      = $this->getProductByCategoryId(static::THOITRANG_NAM);
        $data['thoitrang_chobe']    = $this->getProductByCategoryId(static::THOITRANG_CHOBE);
        $data['phukien_thoitrang']  = $this->getProductByCategoryId(static::PHUKIEN_THOITRANG);

    	return view('frontend.theme-ecommerce.home', $data);
    }

}
