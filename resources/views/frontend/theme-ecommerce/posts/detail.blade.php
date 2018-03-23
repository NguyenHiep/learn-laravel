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
        <img class="post-img" src="http://placehold.it/1140x580" alt="">
        <div class="content clearfix">
          {!! $post->post_full !!}
        </div>
        <!-- Share Links -->
        <div class="post-share-wrap">
          <ul class="post-share">
            <li>
              <a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php echo request()->fullUrl(); ?>','sharer', 'toolbar=0,status=0,width=620,height=280');" data-toggle="tooltip" title="Share on Facebook" href="javascript:">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a onclick="popUp=window.open('http://twitter.com/home?status=<?php echo $post->title; echo request()->fullUrl();?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on Twitter" href="javascript:;">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a onclick="popUp=window.open('http://vk.com/share.php?url=<?php echo request()->fullUrl();?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on VK" href="javascript:;">
                <i class="fa fa-vk"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Pinterest" onclick="popUp=window.open('http://pinterest.com/pin/create/button/?url=<?php echo request()->fullUrl();?>&amp;description=<?php echo $post->post_intro; ?>&amp;media=http://discover.real-web.pro/wp-content/uploads/2016/09/insect-1130497_1920.jpg','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                <i class="fa fa-pinterest"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Google +1" href="javascript:;" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo request()->fullUrl();?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Linkedin" onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo request()->fullUrl();?>&amp;title=<?php echo $post->post_title; ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Tumblr" onclick="popUp=window.open('http://www.tumblr.com/share/link?url=<?php echo request()->fullUrl(); ?>&amp;name=<?php echo $post->post_title; ?>&amp;description=<?php echo $post->post_intro; ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
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
              <a class="posts-i-img" href="{{ route('posts.detail', $post->post_slug) }}"><span style="background: url(http://placehold.it/354x236)"></span></a>
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
      
      <!-- Related Products - start -->
      <div class="prod-related">
        <h2><span>Related products</span></h2>
        <div class="prod-related-car" id="prod-related-car">
          <ul class="slides">
            <li class="prod-rel-wrap">
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x311" alt="Adipisci aperiam commodi">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Adipisci aperiam commodi</a></h3>
                  <p class="prod-rel-price">
                    <b>$59</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x366" alt="Nulla numquam obcaecati">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Nulla numquam obcaecati</a></h3>
                  <p class="prod-rel-price">
                    <b>$48</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/370x300" alt="Dignissimos eaque earum">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Dignissimos eaque earum</a></h3>
                  <p class="prod-rel-price">
                    <b>$37</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x345" alt="Porro quae quasi">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Porro quae quasi</a></h3>
                  <p class="prod-rel-price">
                    <b>$85</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
            
            
            <li class="prod-rel-wrap">
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/378x300" alt="Sunt temporibus velit">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Sunt temporibus velit</a></h3>
                  <p class="prod-rel-price">
                    <b>$115</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x394" alt="Harum illum incidunt">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Harum illum incidunt</a></h3>
                  <p class="prod-rel-price">
                    <b>$130</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x303" alt="Reprehenderit rerum">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Reprehenderit rerum</a></h3>
                  <p class="prod-rel-price">
                    <b>$210</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x588" alt="Quae quasi adipisci alias">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Quae quasi adipisci alias</a></h3>
                  <p class="prod-rel-price">
                    <b>$85</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
            
            
            <li class="prod-rel-wrap">
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x416" alt="Maxime molestias necessitatibus nobis">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Maxime molestias necessitatibus nobis</a></h3>
                  <p class="prod-rel-price">
                    <b>$95</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x480" alt="Facilis illum">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Facilis illum</a></h3>
                  <p class="prod-rel-price">
                    <b>$150</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
            
            </li>
          </ul>
        </div>
      </div>
      <!-- Related Products - end -->
      @if(count($comments))
      <!-- Comments - start -->
      <ul class="reviews-list">
        @foreach($comments as $comment)
        <li class="reviews-i existimg">
          <div class="reviews-i-img">
            <img src="http://placehold.it/120x120" alt="Jeni Margie">
            <div class="reviews-i-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <time datetime="2017-12-21 12:19:46" class="reviews-i-date">{{ format_date($comment->created_at, '%d %b %Y') }}</time>
          </div>
          <div class="reviews-i-cont">
            <p>{{ $comment->content }}</p>
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