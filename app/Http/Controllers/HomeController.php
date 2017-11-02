<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $section_display = [
            'hello',
            'skill',
            'experience',
            'education',
            'portfolio',
            'feedback',
            'contact',
        ];
    	//Các logic triển khai khi lấy dữ liệu
    	return view('frontend.home',compact('section_display'));
    }
}
