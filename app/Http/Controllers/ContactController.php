<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends FrontendController
{

    public function index()
    {
        $record = new \stdClass();
        $record->page_title   = 'Liên hệ';
        $record->page_intro   = 'Liên hệ';
        $record->page_keyword = 'Liên hệ';
        return view('frontend.theme-ecommerce.contact')->with(['record' => $record]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email',
            'mess'  => 'required|string',
        ]);
        //TODO: save info
        
        //TODO: Sent mail
    }
}
