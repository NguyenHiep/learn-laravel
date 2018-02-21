<?php

namespace App\Http\Controllers;

use App\Model\Sliders;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function index(){
        $data['sliders'] = Sliders::where('slider_status', STATUS_ENABLE)->get();
    	return view('frontend.theme-ecommerce.home', $data);
    }
}
