<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontCommentRequest;
use App\Model\Posts;
use Illuminate\Http\Request;

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
        $post        = $this->mposts->getPostBySlug($slug);
        $post_id     = $post->id;
        $space       = 3; // Khoang cach
        $limit_max   = max($post_id + $space, 0);
        $limit_min   = max($post_id - $space, 0);
        $ids_related = [];

        for ($i = $limit_min; $i <= $limit_max; $i++)
        {
            if($i != $post_id)
            {
                $ids_related[] = $i;
            }
        }
        $post_related = $this->mposts->getRelatedPost($ids_related);
        $comments = $this->mposts->getCommentByPostId($post_id);
        $data['post']         = $post;
        $data['post_related'] = $post_related;
        $data['comments']     = $comments;
        return view('frontend.theme-ecommerce.posts.detail', $data);
    }

    public function comment(FrontCommentRequest $request)
    {
        $inputs = $request->all();
        $inputs['comment_status'] = STATUS_DISABLE;
        $inputs['ip_user'] = getRealIpAddr();
        echo "<pre>";
            var_dump($inputs);
        echo "</pre>";
        die();
    }

}
