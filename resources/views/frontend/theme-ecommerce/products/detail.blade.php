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
        {{--<li>
          <a href="catalog-list.html">
            Catalog
          </a>
        </li>
        <li>
          <a href="catalog-list.html">
            Women
          </a>
        </li>--}}
        <li>
          <span>{{ $product->name }}</span>
        </li>
      </ul>
      <h1 class="main-ttl"><span>{{ $product->name }}</span></h1>
      <!-- Single Product - start -->
      <div class="prod-wrap">
        
        <!-- Product Images -->
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
              @if(count($product->galary_img) > 0)
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
              @if(count($product->galary_img) > 0)
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
        
        <!-- Product Description/Info -->
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
            <a href="#" class="prod-favorites"><i class="fa fa-heart"></i> Yêu thích</a>
            <a href="#" class="prod-compare prod-i-compare"  data-id="{{ $product->id }}"><i class="fa fa-bar-chart"></i> So sánh</a>
          </p>
          {{--<div class="prod-skuwrap">
            <p class="prod-skuttl">Color</p>
            <ul class="prod-skucolor">
              <li class="active">
                <img src="img/color/blue.jpg" alt="">
              </li>
              <li>
                <img src="img/color/red.jpg" alt="">
              </li>
              <li>
                <img src="img/color/green.jpg" alt="">
              </li>
              <li>
                <img src="img/color/yellow.jpg" alt="">
              </li>
              <li>
                <img src="img/color/purple.jpg" alt="">
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
              <input value="1" type="text">
              <a href="#" class="prod-plus"><i class="fa fa-angle-up"></i></a>
              <a href="#" class="prod-minus"><i class="fa fa-angle-down"></i></a>
            </p>
            <p class="prod-addwrap">
              <a href="#" class="prod-add" rel="nofollow">Thêm vào giỏ hàng</a>
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
      <!-- Single Product - end -->
      
      <!-- Related Products - start -->
      <div class="prod-related">
        <h2><span>Sản phẩm tương tự</span></h2>
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
            
            </li>
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
            
            </li>
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
    
    </section>
  </main>
@endsection