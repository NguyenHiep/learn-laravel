<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;

class PostsController extends FrontendController
{

    public function show()
    {
        $data['product'] = null;
        return view('frontend.theme-ecommerce.posts.show', $data);
    }

    public function detail()
    {
        return view('frontend.theme-ecommerce.posts.detail');
    }

}
