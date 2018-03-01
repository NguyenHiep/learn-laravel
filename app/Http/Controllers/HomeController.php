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

        $data['sliders']                     = Sliders::where('slider_status', STATUS_ENABLE)->get();
        $data['tabs'] = [
            [
                'title' => 'Sản phẩm bán chạy nhất',
                'items' => $this->getRandomProducts()
            ],
            [
                'title' => 'Sản phẩm mới về',
                'items' => $this->getProductByCategoryId(static::THOITRANG_NAM)
            ],

        ];
        $data['thoitrang_nu']                = $this->getProductByCategoryId(static::THOITRANG_NU);
        $data['thoitrang_nam']               = $this->getProductByCategoryId(static::THOITRANG_NAM);
        $data['thoitrang_chobe']             = $this->getProductByCategoryId(static::THOITRANG_CHOBE);
        $data['phukien_thoitrang']           = $this->getProductByCategoryId(static::PHUKIEN_THOITRANG);
        /*echo "<pre>";
            var_dump(count(session()->get('items_compare')));
        echo "</pre>";
        die();*/
       /* echo "<pre>";
            var_dump(session()->all());
        echo "</pre>";
        die();*/
    	return view('frontend.theme-ecommerce.home', $data);
    }

}
