@extends('frontend.theme-ecommerce.template')

@section('title', $post->post_title)
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container">
      <ul class="b-crumbs">
        <li><a href="{{ route('home') }}">Trang chủ</a></li>
        <li><a href="{{ route('posts.show') }}">Tin tức</a></li>
        <li><span>{{ $post->post_title }}</span></li>
      </ul>
      <h1 class="main-ttl"><span>{{ $post->post_title }}</span></h1>
      <!-- Blog Post - start -->
      <div class="post-wrap stylization">
        <div class="content clearfix">
          {!! $post->post_full !!}
        </div>
        <!-- Share Links -->
        <div class="post-share-wrap">
          <ul class="post-share">
            <li>
              <a onclick="window.open('//www.facebook.com/sharer.php?s=100&amp;p[url]={{ request()->fullUrl() }}','sharer', 'toolbar=0,status=0,width=620,height=280');" data-toggle="tooltip" title="Share on Facebook" href="javascript:">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a onclick="popUp=window.open('//twitter.com/home?status={{ $post->title .''. request()->fullUrl() }}','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on Twitter" href="javascript:;">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a onclick="popUp=window.open('//vk.com/share.php?url={{ request()->fullUrl() }}','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on VK" href="javascript:;">
                <i class="fa fa-vk"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Pinterest" onclick="popUp=window.open('//pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&amp;description={{ $post->post_intro }}&amp;media={{ asset($post->image) }}','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                <i class="fa fa-pinterest"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Linkedin" onclick="popUp=window.open('//linkedin.com/shareArticle?mini=true&amp;url={{ request()->fullUrl() }}&amp;title={{ $post->post_title }}','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Tumblr" onclick="popUp=window.open('//www.tumblr.com/share/link?url={{ request()->fullUrl() }}&amp;name={{ $post->post_title }}&amp;description={{ $post->post_intro }}','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                <i class="fa fa-tumblr"></i>
              </a>
            </li>
          </ul>
          <ul class="post-info">
            <li><time datetime="{{ $post->created_at }}">{{ format_date($post->created_at, '%d %b, %Y') }}</time></li>
            <li><a href="{{ route('posts.show') }}" class="blog-i-categ">Tin tức</a></li>
            <li>Bình luận: <a href="#">{{ $comments->count() }}</a></li>
          </ul>
        </div>
        @if(count($post_related) > 0)
        <!-- Related Posts -->
        <div class="flexslider post-rel-wrap" id="post-rel-car">
          <ul class="slides">
            @foreach($post_related as $post)
            <li class="posts-i">
              <a class="posts-i-img" href="{{ route('posts.detail', $post->post_slug) }}"><span style="background: url({{ asset('theme-ecommerce/img/354x236.png') }}"></span></a>
              <time class="posts-i-date" datetime="{{ $post->created_at }}"><span>{{ format_date($post->created_at, '%d') }}</span> {{ format_date($post->created_at, '%b') }}</time>
              <div class="posts-i-info">
                <a class="posts-i-ctg" href="{{ route('posts.show') }}">Tin tức</a>
                <h3 class="posts-i-ttl"><a href="{{ route('posts.detail', $post->post_slug) }}">{{ $post->post_title }}</a></h3>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
      <!-- Blog Post - end -->
      @if(count($comments))
      <!-- Comments - start -->
      <ul class="reviews-list">
        @foreach($comments as $comment)
        <li class="reviews-i existimg">
          <div class="reviews-i-img">
            <img src="{{ asset('theme-ecommerce/img/120x120.png') }}" alt="Jeni Margie">
            <div class="reviews-i-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <time datetime="{{ $comment->created_at }}" class="reviews-i-date">{{ format_date($comment->created_at, '%d %b %Y') }}</time>
          </div>
          <div class="reviews-i-cont">
            <p>{!! $comment->content  !!}</p>
            <span class="reviews-i-margin"></span>
            <h3 class="reviews-i-ttl">{{ $comment->name }}</h3>
          </div>
        </li>
        @endforeach
      </ul>
      {{ $comments->appends(request()->query())->links('vendor.pagination.theme')  }}
      <!-- Comments - end -->
      @endif
      <!-- Comment Form - start -->
      <div class="prod-comment-form post-form">
        <h3>Bình luận bài viết</h3>
        {!! Form::open(['route' => 'posts.comment']) !!}
          {{ Form::text('name', old('name'), [ 'placeholder' => 'Họ tên']) }}
          @if ($errors->has('name'))
          <div class="form-required" style="clear: left;">{{$errors->first('name')}}</div>
          @endif
          {{ Form::text('email', old('email'), [ 'placeholder' => 'E-mail']) }}
          @if ($errors->has('email'))
            <div class="form-required" style="clear: left;">{{$errors->first('email')}}</div>
          @endif
          {{ Form::textarea('content', old('content'), [ 'placeholder' => 'Nội dung bình luận']) }}
          @if ($errors->has('content'))
            <div class="form-required" style="clear: left;">{{$errors->first('content')}}</div>
          @endif
          <div class="prod-comment-submit">
            <div class="prod-rating">
              <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o active" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
            </div>
            {{ Form::hidden('rate', 4, ['id' => 'rate_select']) }}
            {{ Form::hidden('posts_id', $post->id) }}
            <input type="submit" value="Bình luận">
          </div>
         {!! Form::close() !!}
      </div>
      <!-- Comment Form - end -->
    
    </section>
  </main>
  <!-- Main Content - end -->
@endsection