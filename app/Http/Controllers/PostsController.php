<?php

namespace App\Http\Controllers;

use App\Model\Posts;

class PostsController extends FrontendController
{
    const CAT_NEWS_ID = 1;

    public $mposts;

    public function __construct()
    {
        $this->mposts = new Posts();
    }

    public function show()
    {
        $data['posts'] = $this->mposts->getListAll();
        return view('frontend.theme-ecommerce.posts.show', $data);
    }

    public function detail($slug)
    {
        $data['post'] = $this->mposts->getPostBySlug($slug);
        return view('frontend.theme-ecommerce.posts.detail', $data);
    }

}
