<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pages;

class PagesController extends FrontendController
{
    public function index($page_slug = null){
        if(empty($page_slug)){
            return abort(404);
        }
        $record = Pages::where('page_slug',$page_slug)->first();
        if(is_null($record)){
            return abort(404);
        }
        return view('frontend.theme-ecommerce.page-static.pages')->with(['record'  => $record]);
    }

    public function contact($page_slug){

        $record = Pages::where('page_slug',$page_slug)->first();
        if(is_null($record)){
            return abort(404);
        }
        return view('frontend.theme-ecommerce.page-static.contact')->with(['record'  => $record]);
    }


}
