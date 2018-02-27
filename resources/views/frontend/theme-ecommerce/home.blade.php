@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container">
      @if(count($sliders))
      <!-- Slider -->
      <div class="fr-slider-wrap">
        <div class="fr-slider">
          <ul class="slides">
            @foreach($sliders as $slider)
              <li>
                @if(empty($slider['slider_img']))
                  <img src="img/slider/slide1.jpg" alt="">
                @else
                  <img src="{{ asset(UPLOAD_SLIDER.$slider['slider_img'])}}" alt="{{ $slider['slider_title'] }}" class="img-responsive"/>
                @endif
                <div class="fr-slider-cont">
                  <h3>{{ $slider['slider_title'] }}</h3>
                  <p>{{ $slider['slider_content'] }}</p>
                  <p class="fr-slider-more-wrap">
                    <a class="fr-slider-more" href="{{ $slider['slider_url'] }}" target="{{ __('selector.target.'.$slider['slider_target']) }}">Xem chi tiết</a>
                  </p>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
      
      <!-- Popular Products -->
      <div class="fr-pop-wrap">
        <h3 class="component-ttl"><span>Giá sỉ nổi bật  </span></h3>
        @if(count($tabs))
          <?php
            //TODO: check code for tab
          ?>
          <ul class="fr-pop-tabs sections-show">
            @foreach($tabs as  $tab)
            <li><a data-frpoptab-num="{{ $loop->index }}" data-frpoptab="#frpoptab-tab-{{ $loop->index }}" href="#" @if($loop->first)class="active" @endif >{{ $tab['title'] }}</a></li>
            @endforeach
          </ul>
          <div class="fr-pop-tab-cont">
            <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-1">
              <ul class="slides">
                @foreach($tabs as  $key => $tab)
                  @foreach($tab['items'] as $product)
                    <li class="prod-i">
                      <div class="prod-i-top">
                        <a href="{{ route('product.show', $product->slug) }}" class="prod-i-img"><!-- NO SPACE -->
                          <img src="http://placehold.it/250x350" alt="Aspernatur excepturi rem"><!-- NO SPACE -->
                        </a>
                        <p class="prod-i-info">
                          <a href="#" class="prod-i-favorites"><span>Yêu thích</span><i class="fa fa-heart"></i></a>
                          <a href="#" class="prod-i-qview"><span>Xem nhanh</span><i class="fa fa-search"></i></a>
                          <a class="prod-i-compare" href="#"><span>So sánh</span><i class="fa fa-bar-chart"></i></a>
                        </p>
                        <p class="prod-i-addwrap">
                          <a href="{{ route('product.show', $product->slug) }}" class="prod-i-add">Xem chi tiết</a>
                        </p>
                      </div>
                      <h3>
                        <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                      </h3>
                      <p class="prod-i-price">
                        <b>{{ format_price($product->price)  }}</b>
                      </p>
                      {{--<div class="prod-i-skuwrapcolor">
                        <ul class="prod-i-skucolor">
                          <li class="bx_active"><img src="img/color/red.jpg" alt="Red"></li>
                          <li><img src="img/color/blue.jpg" alt="Blue"></li>
                        </ul>
                      </div>
                      <div class="prod-sticker">
                        <p class="prod-sticker-1">Mới</p>
                        <br><p class="prod-sticker-2">Hot</p>
                      </div>--}}
                    </li>
                  @endforeach
                @endforeach
              </ul>
            </div>
          </div><!-- .fr-pop-tab-cont -->
        @endif
      </div><!-- .fr-pop-wrap -->
      
      @include('frontend.theme-ecommerce.template-parts.loop-product', ['datas' => ['category_name' => 'Thời trang nữ', 'products' => $thoitrang_nu]])
      @include('frontend.theme-ecommerce.template-parts.loop-product', ['datas' => ['category_name' => 'Thời trang nam', 'products' => $thoitrang_nam]])
      @include('frontend.theme-ecommerce.template-parts.loop-product', ['datas' => ['category_name' => 'Thời trang cho bé', 'products' => $thoitrang_chobe]])
      @include('frontend.theme-ecommerce.template-parts.loop-product', ['datas' => ['category_name' => 'Phụ kiện thời trang', 'products' => $phukien_thoitrang]])
      
      <!-- Quick View Product - start -->
      <div class="qview-modal">
        <div class="prod-wrap">
          <a href="product.html">
            <h1 class="main-ttl">
              <span>Reprehenderit adipisci</span>
            </h1>
          </a>
          <div class="prod-slider-wrap">
            <div class="prod-slider">
              <ul class="prod-slider-car">
                <li>
                  <a data-fancybox-group="popup-product" class="fancy-img" href="http://placehold.it/500x525">
                    <img src="http://placehold.it/500x525" alt="">
                  </a>
                </li>
                <li>
                  <a data-fancybox-group="popup-product" class="fancy-img" href="http://placehold.it/500x591">
                    <img src="http://placehold.it/500x591" alt="">
                  </a>
                </li>
                <li>
                  <a data-fancybox-group="popup-product" class="fancy-img" href="http://placehold.it/500x525">
                    <img src="http://placehold.it/500x525" alt="">
                  </a>
                </li>
                <li>
                  <a data-fancybox-group="popup-product" class="fancy-img" href="http://placehold.it/500x722">
                    <img src="http://placehold.it/500x722" alt="">
                  </a>
                </li>
                <li>
                  <a data-fancybox-group="popup-product" class="fancy-img" href="http://placehold.it/500x722">
                    <img src="http://placehold.it/500x722" alt="">
                  </a>
                </li>
                <li>
                  <a data-fancybox-group="popup-product" class="fancy-img" href="http://placehold.it/500x722">
                    <img src="http://placehold.it/500x722" alt="">
                  </a>
                </li>
                <li>
                  <a data-fancybox-group="popup-product" class="fancy-img" href="http://placehold.it/500x722">
                    <img src="http://placehold.it/500x722" alt="">
                  </a>
                </li>
              </ul>
            </div>
            <div class="prod-thumbs">
              <ul class="prod-thumbs-car">
                <li>
                  <a data-slide-index="0" href="#">
                    <img src="http://placehold.it/500x525" alt="">
                  </a>
                </li>
                <li>
                  <a data-slide-index="1" href="#">
                    <img src="http://placehold.it/500x591" alt="">
                  </a>
                </li>
                <li>
                  <a data-slide-index="2" href="#">
                    <img src="http://placehold.it/500x525" alt="">
                  </a>
                </li>
                <li>
                  <a data-slide-index="3" href="#">
                    <img src="http://placehold.it/500x722" alt="">
                  </a>
                </li>
                <li>
                  <a data-slide-index="4" href="#">
                    <img src="http://placehold.it/500x722" alt="">
                  </a>
                </li>
                <li>
                  <a data-slide-index="5" href="#">
                    <img src="http://placehold.it/500x722" alt="">
                  </a>
                </li>
                <li>
                  <a data-slide-index="6" href="#">
                    <img src="http://placehold.it/500x722" alt="">
                  </a>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="prod-cont">
            <p class="prod-actions">
              <a href="#" class="prod-favorites"><i class="fa fa-heart"></i> Add to Wishlist</a>
              <a href="#" class="prod-compare"><i class="fa fa-bar-chart"></i> Compare</a>
            </p>
            <div class="prod-skuwrap">
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
              <p class="prod-skuttl">Sizes</p>
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
            </div>
            <div class="prod-info">
              <p class="prod-price">
                <b class="item_current_price">$238</b>
              </p>
              <p class="prod-qnt">
                <input type="text" value="1">
                <a href="#" class="prod-plus"><i class="fa fa-angle-up"></i></a>
                <a href="#" class="prod-minus"><i class="fa fa-angle-down"></i></a>
              </p>
              <p class="prod-addwrap">
                <a href="#" class="prod-add">Add to cart</a>
              </p>
            </div>
            <ul class="prod-i-props">
              <li>
                <b>SKU</b> 05464207
              </li>
              <li>
                <b>Manufacturer</b> Mayoral
              </li>
              <li>
                <b>Material</b> Cotton
              </li>
              <li>
                <b>Pattern Type</b> Print
              </li>
              <li>
                <b>Wash</b> Colored
              </li>
              <li>
                <b>Style</b> Cute
              </li>
              <li>
                <b>Color</b> Blue, Red
              </li>
              <li><a href="#" class="prod-showprops">All Features</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Quick View Product - end -->
    </section>
  </main>
  <!-- Main Content - end -->
@endsection