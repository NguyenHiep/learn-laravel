<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	
    	//Các logic triển khai khi lấy dữ liệu
    	return view('home');
    }
}
