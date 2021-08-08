<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontCommentRequest;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostsController extends FrontendController
{
    public $postRepository;
    public $commentRepository;
    const COOKIE_ONE_YEAR = 525600;

    public function __construct(PostRepository $postRepository, CommentRepository $commentRepository)
    {
        $this->postRepository    = $postRepository;
        $this->commentRepository = $commentRepository;
    }

    public function show()
    {
        $recentPosts = $this->getCookiePostRecent();
        $recentIds = [];
        if (!empty($recentPosts) && is_array($recentPosts)) {
            $recentIds = array_keys($recentPosts);
        }
        $data['posts_recent'] = $this->postRepository->getRelatedPost($recentIds);
        $data['posts'] = $this->postRepository->getListPostNew();
        $data['posts_recent_original'] = $recentPosts;
        return view('frontend.theme-phiten.posts.show', $data);
    }

    public function detail($slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);
        if (empty($post)) {
            return abort(404);
        }
        $postId     = $post->id;
        $space       = 3; // Khoang cach
        $limitMax   = max($postId + $space, 0);
        $limitMin   = max($postId - $space, 0);
        $relatedIds = [];

        for ($i = $limitMin; $i <= $limitMax; $i++) {
            if ($i !== $postId) {
                $relatedIds[] = $i;
            }
        }
        $this->setCookiePostRecent($postId);
        $recentPosts = $this->getCookiePostRecent();
        $recentIds = [];
        if (!empty($recentPosts) && is_array($recentPosts)) {
            $recentIds = array_keys($recentPosts);
        }
        $data['post'] = $post;
        $data['post_related'] = $this->postRepository->getRelatedPost($relatedIds);
        $data['posts_recent'] = $this->postRepository->getRelatedPost($recentIds);
        $data['posts_recent_original'] = $recentPosts;
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
            $lastViewedPost = json_decode($lastViewedPost, true);
        }
        if (!array_key_exists($postId, $lastViewedPost)) {
            $count = count($lastViewedPost);
            if ($count > $limit) {
                array_shift($lastViewedPost);
            }
            $lastViewedPost[$postId] = Carbon::now();
        }
        return Cookie::queue(Cookie::make('post_ids', json_encode($lastViewedPost), self::COOKIE_ONE_YEAR));
    }

    private function getCookiePostRecent()
    {
        $lastViewedPost = Cookie::get('post_ids');
        return json_decode($lastViewedPost, true);
    }

    private function deleteCookieBookRecent()
    {
        return Cookie::queue(Cookie::forget('post_ids'));
    }

}
