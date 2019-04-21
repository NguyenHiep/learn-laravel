@extends('frontend.theme-ecommerce.template')

@section('title', !(empty($product->meta_title)) ? $product->meta_title : $product->name)
@section('description', !(empty($product->meta_description)) ? $product->meta_description : $product->short_description)
@section('keywords', !(empty($product->meta_keywords)) ? $product->meta_keywords : $product->short_description)

@section('content')
  <main>
    <section class="container">
      <ul class="b-crumbs">
        <li>
          <a href="{{ URL::to('/') }}">Trang chủ</a>
        </li>
        <li>
          <span>{{ $product->name }}</span>
        </li>
      </ul>
      <h1 class="main-ttl"><span>{{ $product->name }}</span></h1>
      <div class="prod-wrap">
        <div class="prod-slider-wrap">
          <div class="prod-slider">
            <ul class="prod-slider-car">
              <li>
              @if(!empty($product->pictures))
                  <a data-fancybox-group="product" class="fancy-img" href="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}">
                <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
                  </a>
              @else
                <a data-fancybox-group="product" class="fancy-img" href="http://placehold.it/500x642">
                  <img src="http://placehold.it/500x642" alt="{{ $product->name }}" title="{{ $product->name }}" />
                </a>
              @endif
              </li>
              @if(!empty($product->galary_img))
                @foreach($product->galary_img as $item)
                  <li>
                    <a data-fancybox-group="product" class="fancy-img" href="{{asset(UPLOAD_PRODUCT.$item)}}">
                      <img src="{{asset(UPLOAD_PRODUCT.$item)}}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-responsive" />
                    </a>
                  </li>
                @endforeach
              @endif
             
            </ul>
          </div>
          <div class="prod-thumbs">
            <ul class="prod-thumbs-car">
              <li>
                @if(!empty($product->pictures))
                  <a data-slide-index="0" href="#">
                  <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
                  </a>
                @else
                  <a data-slide-index="0" href="#">
                    <img src="http://placehold.it/500x642" alt="{{ $product->name }}" title="{{ $product->name }}" />
                  </a>
                @endif
              </li>
              @if(!empty($product->galary_img))
                @foreach($product->galary_img as $item)
                  <li>
                    <a data-slide-index="{{ $loop->iteration }}" href="#">
                      <img src="{{asset(UPLOAD_PRODUCT.$item)}}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-responsive" />
                    </a>
                  </li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>
        <div class="prod-cont">
          <ul class="prod-cont-txt">
            <li>
              <b>Mã sản phẩm</b> {{ $product->sku }}
            </li>
            <li>
              <b>Xuất xứ</b> 05464207
            </li>
            <li>
              <b>Trạng thái</b> còn hàng
            </li>
          </ul>
          <div class="prod-cont-txt">{!!  $product->short_description !!}</div>
          <p class="prod-actions">
            <a href="javascript:void(0)" class="prod-favorites" data-id="{{ $product->id }}"><i class="fa fa-heart"></i> Yêu thích</a>
            <a href="javascript:void(0)" class="prod-compare compare_product"  data-id="{{ $product->id }}"><i class="fa fa-bar-chart"></i> So sánh</a>
          </p>
          {{--<div class="prod-skuwrap">
            <p class="prod-skuttl">Color</p>
            <ul class="prod-skucolor">
              <li class="active">
                <img src="{{ asset('img/color/blue.jpg') }}" alt="">
              </li>
              <li>
                <img src="{{ asset('img/color/red.jpg') }}" alt="">
              </li>
              <li>
                <img src="{{ asset('img/color/green.jpg') }}" alt="">
              </li>
              <li>
                <img src="{{ asset('img/color/yellow.jpg') }}" alt="">
              </li>
              <li>
                <img src="{{ asset('img/color/purple.jpg') }}" alt="">
              </li>
            </ul>
            <p class="prod-skuttl">CLOTHING SIZES</p>
            <div class="offer-props-select">
              <p>XL</p>
              <ul>
                <li><a href="#">XS</a></li>
                <li><a href="#">S</a></li>
                <li><a href="#">M</a></li>
                <li class="active"><a href="#">XL</a></li>
                <li><a href="#">L</a></li>
                <li><a href="#">4XL</a></li>
                <li><a href="#">XXL</a></li>
              </ul>
            </div>
          </div>--}}
          <div class="prod-info">
            <p class="prod-price">
              <b class="item_current_price">{{ format_price($product->price) }}</b>
            </p>
            <p class="prod-qnt">
              <input value="1" type="text" class="quantity_item" readonly>
              <a href="javascript:void(0)" class="prod-plus plus_quantity"><i class="fa fa-angle-up"></i></a>
              <a href="javascript:void(0)" class="prod-minus minus_quantity"><i class="fa fa-angle-down"></i></a>
            </p>
            <p class="prod-addwrap">
              <a href="javascript:void(0)" class="prod-add add_to_cart" rel="nofollow" data-id="{{ $product->id }}">Mua</a>
            </p>
          </div>
         {{-- <ul class="prod-i-props">
            <li>
              <b>SKU</b> 05464207
            </li>
            <li>
              <b>Material</b> Nylon
            </li>
            <li>
              <b>Pattern Type</b> Solid
            </li>
            <li>
              <b>Wash</b> Colored
            </li>
            <li>
              <b>Style</b> Sport
            </li>
            <li>
              <b>Color</b> Blue
            </li>
            <li>
              <b>Gender</b> Unisex
            </li>
            <li>
              <b>Rain Cover</b> No
            </li>
            <li>
              <b>Exterior</b> Solid Bag
            </li>
            <li><a href="#" class="prod-showprops">All Features</a></li>
          </ul>--}}
        </div>
        <!-- Product Tabs -->
        <div class="prod-tabs-wrap">
          <ul class="prod-tabs">
            <li><a data-prodtab-num="1" class="active" href="#" data-prodtab="#prod-tab-1">Mô tả</a></li>
            <li><a data-prodtab-num="2" href="#" data-prodtab="#prod-tab-2">Đánh giá (3)</a></li>
          </ul>
          <div class="prod-tab-cont">
            <p data-prodtab-num="1" class="prod-tab-mob active" data-prodtab="#prod-tab-1">Mô tả</p>
            <div class="prod-tab stylization" id="prod-tab-1"> {!! $product->description !!}</div>
            <p data-prodtab-num="2" class="prod-tab-mob" data-prodtab="#prod-tab-2">Đánh giá (3)</p>
            <div class="prod-tab" id="prod-tab-2">
              <ul class="reviews-list">
                <li class="reviews-i existimg">
                  <div class="reviews-i-img">
                    <img src="http://placehold.it/120x120" alt="Averill Sidony">
                    <div class="reviews-i-rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                  </div>
                  <div class="reviews-i-cont">
                    <p>Numquam aliquam maiores ratione dolores ducimus, laborum hic similique delectus. Neque saepe nobis omnis laudantium itaque tempore voluptate harum error, illum nemo, reiciendis architecto, quam tenetur amet sit quisquam cum.<br>Pariatur cum tempore eius nulla impedit cumque odit quos porro iste a voluptas, optio alias voluptate minima distinctio facere aliquid quasi, vero illum tenetur sed temporibus eveniet obcaecati.</p>
                    <span class="reviews-i-margin"></span>
                    <h3 class="reviews-i-ttl">Averill Sidony</h3>
                    <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                  </div>
                  <div class="reviews-i-answer">
                    <p>Thanks for your feedback!<br>
                      Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero explicabo, esse dolores rem at dolorum doloremque iusto laboriosam repellendus. <br>Numquam eius voluptatum sint modi nihil exercitationem dolorum asperiores maiores provident repellat magnam vitae, consequatur omnis expedita, accusantium voluptas odit id.</p>
                    <span class="reviews-i-margin"></span>
                  </div>
                </li>
                <li class="reviews-i existimg">
                  <div class="reviews-i-img">
                    <img src="http://placehold.it/120x120" alt="Araminta Kristeen">
                    <div class="reviews-i-rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <time datetime="2017-12-21 12:19:46" class="reviews-i-date">14 February 2017</time>
                  </div>
                  <div class="reviews-i-cont">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    <span class="reviews-i-margin"></span>
                    <h3 class="reviews-i-ttl">Araminta Kristeen</h3>
                    <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                  </div>
                  <div class="reviews-i-answer">
                    Benjy, hi!<br>
                    Officiis culpa quos, quae optio quia.<br>
                    Amet sunt dolorem tempora, pariatur earum quidem adipisci error voluptates tempore iure, nobis optio temporibus voluptatum delectus natus accusamus incidunt provident sapiente explicabo vero labore hic quo?
                    <span class="reviews-i-margin"></span>
                  </div>
                </li>
                <li class="reviews-i">
                  <div class="reviews-i-cont">
                    <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                    <div class="reviews-i-rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    <span class="reviews-i-margin"></span>
                    <h3 class="reviews-i-ttl">Jeni Margie</h3>
                    <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                  </div>
                  <div class="reviews-i-answer">
                    Hello, Jeni Margie!<br>
                    Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero explicabo, esse dolores rem at dolorum doloremque iusto laboriosam repellendus. <br>Numquam eius voluptatum sint modi nihil exercitationem dolorum asperiores maiores provident repellat magnam vitae, consequatur omnis expedita, accusantium voluptas odit id.
                    <span class="reviews-i-margin"></span>
                  </div>
                </li>
              </ul>
              <div class="prod-comment-form">
                <h3>Add your review</h3>
                <form method="POST" action="#">
                  <input type="text" placeholder="Name">
                  <input type="text" placeholder="E-mail">
                  <textarea placeholder="Your review"></textarea>
                  <div class="prod-comment-submit">
                    <input type="submit" value="Submit">
                    <div class="prod-rating">
                      <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      
      </div>
      <div class="prod-related">
        <h2><span>Sản phẩm tương tự</span></h2>
        @if(!empty($product_related))
          <div class="prod-related-car" id="prod-related-car">
            <ul class="slides">
              <li class="prod-rel-wrap">
                @foreach($product_related as $product)
                  <div class="prod-rel">
                    <a href="{{ route('product.show', $product->slug) }}" title="{{ $product->name }}" class="prod-rel-img">
                      @if(!empty($product->pictures))
                        <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}"  title="{{ $product->name }}"/>
                      @else
                        <img src="http://placehold.it/300x300" alt="{{ $product->name }}" title="{{ $product->name }}" />
                      @endif
                    </a>
                    <div class="prod-rel-cont">
                      <h3><a href="{{ route('product.show', $product->slug) }}" title="{{ $product->name }}">{{ $product->name }}</a></h3>
                      <p class="prod-rel-price">
                        <b>{{ format_price($product->price) }}</b>
                      </p>
                      <div class="prod-rel-actions">
                        <a title="Yêu thích" href="javascript:void(0)" class="prod-rel-favorites" data-id="{{ $product->id }}"><i class="fa fa-heart"></i></a>
                        <a title="So sánh" href="javascript:void(0)" class="prod-rel-compare compare_product" data-id="{{ $product->id }}"><i class="fa fa-bar-chart"></i></a>
                        <p class="prod-i-addwrap">
                          <a title="Mua" href="javascript:void(0)" class="prod-i-add add_to_cart" data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a>
                        </p>
                      </div>
                    </div>
                </div>
                @endforeach
              </li>
            </ul>
          </div>
        @endif
      </div>
    </section>
  </main>
@endsection