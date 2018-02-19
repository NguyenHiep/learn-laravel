<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends FrontendController
{
    public function index(){
    	return view('frontend.theme-ecommerce.home');
    }
}
