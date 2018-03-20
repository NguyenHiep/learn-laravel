@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container">
      <ul class="b-crumbs">
        <li><a href="{{ route('home') }}">Trang chủ</a></li>
        <li><span>Tin tức</span></li>
      </ul>
      <h1 class="main-ttl main-ttl-categs"><span>Tin tức</span></h1>
      <!-- Blog Categories -->
      {{--<ul class="blog-categs">
        <li class="active"><a href="blog.html">All</a></li>
        <li><a href="blog.html">News</a></li>
        <li><a href="blog.html">Reviews</a></li>
        <li><a href="blog.html">Articles</a></li>
      </ul>--}}
      
      @if(count($posts) > 0)
      <!-- Blog Posts - start -->
      <div class="posts-list blog-page">
        @foreach($posts as $post)
        <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
          <a class="posts-i-img" href="{{ route('posts.detail', $post->post_slug) }}"><span style="background: url(http://placehold.it/354x236)"></span></a>
          <time class="posts-i-date" datetime="{{ $post->created_at }}"><span>{{ format_date($post->created_at, '%d') }}</span> {{ format_date($post->created_at, '%b') }}</time>
          <h3 class="posts-i-ttl"><a href="{{ route('posts.detail', $post->post_slug) }}">{{ $post->post_title }}</a></h3>
          <div>{!! $post->post_intro !!}</div>
          <a href="{{ route('posts.detail', $post->post_slug) }}" class="posts-i-more">Đọc tiếp...</a>
        </div>
        @endforeach
      </div>
      <!-- Blog Posts - end -->
      @endif
      
      <!-- Pagination - start -->
    {{ $posts->appends(request()->query())->links('vendor.pagination.theme')  }}
      <!-- Pagination - end -->
    </section>
  </main>
  <!-- Main Content - end -->

@endsection