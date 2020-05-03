<?php

namespace App\Http\Controllers;

use App\Model\Pages;

class PagesController extends FrontendController
{
    public $mpage;

    public function __construct()
    {
        $this->mpage = new Pages();
    }

    public function index($page_slug){
        if(empty($page_slug)){
            return abort(404);
        }
        $record = $this->mpage->getPageBySlug($page_slug);
        if(empty($record)){
            return abort(404);
        }
        return view('frontend.theme-phiten.page-static.pages')->with(['record'  => $record]);
    }

    public function contact($page_slug)
    {
        $record = $this->mpage->getPageBySlug($page_slug);
        if (is_null($record)) {
            return abort(404);
        }
        return view('frontend.theme-phiten.page-static.contact')->with(['record' => $record]);
    }

}
