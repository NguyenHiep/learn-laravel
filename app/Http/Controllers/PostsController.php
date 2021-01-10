<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontCommentRequest;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostsController extends FrontendController
{
    public $postRepository;
    public $commentRepository;

    public function __construct(PostRepository $postRepository, CommentRepository $commentRepository)
    {
        $this->postRepository    = $postRepository;
        $this->commentRepository = $commentRepository;
    }

    public function show()
    {
        $ids_recent = $this->getCookiePostRecent();
        $data['posts_recent'] = $this->postRepository->getRelatedPost($ids_recent);
        $data['posts'] = $this->postRepository->getListPostNew();
        return view('frontend.theme-phiten.posts.show', $data);
    }

    public function detail($slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);
        if (empty($post)) {
            return abort(404);
        }
        $post_id     = $post->id;
        $space       = 3; // Khoang cach
        $limit_max   = max($post_id + $space, 0);
        $limit_min   = max($post_id - $space, 0);
        $ids_related = [];

        for ($i = $limit_min; $i <= $limit_max; $i++) {
            if ($i != $post_id) {
                $ids_related[] = $i;
            }
        }
        $this->setCookiePostRecent($post_id);
        $ids_recent = $this->getCookiePostRecent();
        $data['post'] = $post;
        $data['post_related'] = $this->postRepository->getRelatedPost($ids_related);
        $data['posts_recent'] = $this->postRepository->getRelatedPost($ids_recent);
        return view('frontend.theme-phiten.posts.detail', $data);
    }

    public function comment(FrontCommentRequest $request)
    {
        $inputs                   = $request->all();
        $inputs['comment_status'] = config('define.STATUS_DISABLE');
        $inputs['ip_user']        = getRealIpAddr();

        try {
            DB::beginTransaction();
            $this->commentRepository->fill($inputs)->save();
            DB::commit();
            return redirect()->back()->with([
                'message' => __('system.message.comment.success'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error(__METHOD__, [$e->getMessage()]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.comment.failed'),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    private function setCookiePostRecent($postId, $limit = 5)
    {
        if (empty($postId)) {
            return false;
        }
        $lastViewedPost = Cookie::get('post_ids', []);
        if (!empty($lastViewedPost) && is_string($lastViewedPost)) {
            $lastViewedPost = json_decode($lastViewedPost);
        }
        if (!in_array($postId, $lastViewedPost)) {
            $count = count($lastViewedPost);
            if ($count >= $limit) {
                array_shift($lastViewedPost);
            }
            array_push($lastViewedPost, $postId);
        }
        $oneYear = 525600;
        return Cookie::queue(Cookie::make('post_ids', json_encode($lastViewedPost), $oneYear));
    }

    private function getCookiePostRecent()
    {
        $lastViewedPost = Cookie::get('post_ids');
        return json_decode($lastViewedPost);
    }

    private function deleteCookieBookRecent()
    {
        return Cookie::queue(Cookie::forget('post_ids'));
    }

}
