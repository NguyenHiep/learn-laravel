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
        <ul class="fr-pop-tabs sections-show">
          <li><a data-frpoptab-num="1" data-frpoptab="#frpoptab-tab-1" href="#" class="active">Sản phẩm bán chạy nhất</a></li>
          <li><a data-frpoptab-num="2" data-frpoptab="#frpoptab-tab-2" href="#">Sản phẩm mới về</a></li>
        </ul>
        
        <div class="fr-pop-tab-cont">
          <p data-frpoptab-num="1" class="fr-pop-tab-mob active" data-frpoptab="#frpoptab-tab-2">Bán chạy nhất</p>
          <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-1">
            
            <ul class="slides">
              
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x350" alt="Aspernatur excepturi rem"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Go to detail</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Aspernatur excepturi rem</a>
                </h3>
                <p class="prod-i-price">
                  <b>$90</b>
                </p>
                <div class="prod-i-skuwrapcolor">
                  <ul class="prod-i-skucolor">
                    <li class="bx_active"><img src="img/color/red.jpg" alt="Red"></li>
                    <li><img src="img/color/blue.jpg" alt="Blue"></li>
                  </ul>
                </div>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/277x250" alt="Aperiam tempore"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Aperiam tempore</a>
                </h3>
                <p class="prod-i-price">
                  <b>$75</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x324" alt="Blanditiis eaque"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Blanditiis eaque</a>
                </h3>
                <p class="prod-i-price">
                  <b>$115</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x500" alt="Excepturi ducimus"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Excepturi ducimus</a>
                </h3>
                <p class="prod-i-price">
                  <b>$105</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/329x250" alt="Sit recusandae voluptas"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                  
                  <div class="prod-sticker">
                    <p class="prod-sticker-1">NEW</p>
                  </div>
                </div>
                <h3>
                  <a href="product.html">Sit recusandae voluptas</a>
                </h3>
                <p class="prod-i-price">
                  <b>$200</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x317" alt="Consequuntur minus atque"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Consequuntur minus atque</a>
                </h3>
                <p class="prod-i-price">
                  <b>$160</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x329" alt="Nostrum nihil ipsa"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Nostrum nihil ipsa</a>
                </h3>
                <p class="prod-i-price">
                  <b>$140</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x361" alt="Non ex sapiente deserunt"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                  
                  <div class="prod-sticker">
                    <p class="prod-sticker-3">-30%</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
                  </div>
                </div>
                <h3>
                  <a href="product.html">Non ex sapiente deserunt</a>
                </h3>
                <p class="prod-i-price">
                  <b>$65</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x361" alt="Amet tempore unde"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Amet tempore unde</a>
                </h3>
                <p class="prod-i-price">
                  <b>$85</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x361" alt="Neque fugiat voluptates"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Neque fugiat voluptates</a>
                </h3>
                <p class="prod-i-price">
                  <b>$120</b>
                </p>
              </li>
            
            </ul>
          </div>
          
          <p data-frpoptab-num="2" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-3">Ưu đãi đặc biệt</p>
          <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-2">
            
            <ul class="slides">
              
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x302" alt="Amet tempore unde"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Amet tempore unde</a>
                </h3>
                <p class="prod-i-price">
                  <b>$165</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x327" alt="Perspiciatis dolor"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Go to detail</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Perspiciatis dolor</a>
                </h3>
                <p class="prod-i-price">
                  <b>$205</b>
                </p>
                <div class="prod-i-skuwrapcolor">
                  <ul class="prod-i-skucolor">
                    <li class="bx_active"><img src="img/color/red.jpg" alt="Red"></li>
                    <li><img src="img/color/blue.jpg" alt="Blue"></li>
                  </ul>
                </div>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x262" alt="Veritatis officiis quae"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Veritatis officiis quae</a>
                </h3>
                <p class="prod-i-price">
                  <b>$90</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x292" alt="Fuga numquam obcaecati"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Fuga numquam obcaecati</a>
                </h3>
                <p class="prod-i-price">
                  <b>$65</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x351" alt="Ratione magni"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Ratione magni</a>
                </h3>
                <p class="prod-i-price">
                  <b>$125</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x301" alt="Asperiores sit sequi"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Asperiores sit sequi</a>
                </h3>
                <p class="prod-i-price">
                  <b>$140</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x322" alt="Repudiandae accusamus"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Repudiandae accusamus</a>
                </h3>
                <p class="prod-i-price">
                  <b>$95</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x266" alt="Quod praesentium illum"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Quod praesentium illum</a>
                </h3>
                <p class="prod-i-price">
                  <b>$80</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x301" alt="Deleniti ut earum"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Deleniti ut earum</a>
                </h3>
                <p class="prod-i-price">
                  <b>$220</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x362" alt="Voluptatem quibusdam"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Voluptatem quibusdam</a>
                </h3>
                <p class="prod-i-price">
                  <b>$185</b>
                </p>
              </li>
            
            </ul>
          </div>
        </div><!-- .fr-pop-tab-cont -->
      </div><!-- .fr-pop-wrap -->
  
      <div class="fr-pop-wrap">
        <h3 class="component-ttl"><span>Thời trang nữ</span></h3>
        <div class="flexslider prod-items fr-pop-tab">
    
          <ul class="slides">
      
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x350" alt="Aspernatur excepturi rem"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Go to detail</a>
                </p>
              </div>
              <h3>
                <a href="product.html">Aspernatur excepturi rem</a>
              </h3>
              <p class="prod-i-price">
                <b>$90</b>
              </p>
              <div class="prod-i-skuwrapcolor">
                <ul class="prod-i-skucolor">
                  <li class="bx_active"><img src="img/color/red.jpg" alt="Red"></li>
                  <li><img src="img/color/blue.jpg" alt="Blue"></li>
                </ul>
              </div>
            </li>
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/277x250" alt="Aperiam tempore"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Add to cart</a>
                </p>
              </div>
              <h3>
                <a href="product.html">Aperiam tempore</a>
              </h3>
              <p class="prod-i-price">
                <b>$75</b>
              </p>
            </li>
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x324" alt="Blanditiis eaque"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Add to cart</a>
                </p>
              </div>
              <h3>
                <a href="product.html">Blanditiis eaque</a>
              </h3>
              <p class="prod-i-price">
                <b>$115</b>
              </p>
            </li>
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x500" alt="Excepturi ducimus"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Add to cart</a>
                </p>
              </div>
              <h3>
                <a href="product.html">Excepturi ducimus</a>
              </h3>
              <p class="prod-i-price">
                <b>$105</b>
              </p>
            </li>
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/329x250" alt="Sit recusandae voluptas"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Add to cart</a>
                </p>
          
                <div class="prod-sticker">
                  <p class="prod-sticker-1">NEW</p>
                </div>
              </div>
              <h3>
                <a href="product.html">Sit recusandae voluptas</a>
              </h3>
              <p class="prod-i-price">
                <b>$200</b>
              </p>
            </li>
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x317" alt="Consequuntur minus atque"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Add to cart</a>
                </p>
              </div>
              <h3>
                <a href="product.html">Consequuntur minus atque</a>
              </h3>
              <p class="prod-i-price">
                <b>$160</b>
              </p>
            </li>
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x329" alt="Nostrum nihil ipsa"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Add to cart</a>
                </p>
              </div>
              <h3>
                <a href="product.html">Nostrum nihil ipsa</a>
              </h3>
              <p class="prod-i-price">
                <b>$140</b>
              </p>
            </li>
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x361" alt="Non ex sapiente deserunt"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Add to cart</a>
                </p>
          
                <div class="prod-sticker">
                  <p class="prod-sticker-3">-30%</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
                </div>
              </div>
              <h3>
                <a href="product.html">Non ex sapiente deserunt</a>
              </h3>
              <p class="prod-i-price">
                <b>$65</b>
              </p>
            </li>
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x361" alt="Amet tempore unde"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Add to cart</a>
                </p>
              </div>
              <h3>
                <a href="product.html">Amet tempore unde</a>
              </h3>
              <p class="prod-i-price">
                <b>$85</b>
              </p>
            </li>
            <li class="prod-i">
              <div class="prod-i-top">
                <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x361" alt="Neque fugiat voluptates"><!-- NO SPACE --></a>
                <p class="prod-i-info">
                  <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                  <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <p class="prod-i-addwrap">
                  <a href="#" class="prod-i-add">Add to cart</a>
                </p>
              </div>
              <h3>
                <a href="product.html">Neque fugiat voluptates</a>
              </h3>
              <p class="prod-i-price">
                <b>$120</b>
              </p>
            </li>
    
          </ul>
        </div>
      </div>
      <!-- Catalog Items | Full - start -->
      <div class="section-cont section-full">
    
        <div class="prod-items section-items">
      
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/378x300" alt="Sunt temporibus velit"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Gender</dt>
                  <dd>Men<br></dd>
                  <dt>Shaft Material</dt>
                  <dd>Flock<br></dd>
                  <dt>Lining Material</dt>
                  <dd>Plush<br></dd>
                  <dt>Insole Material</dt>
                  <dd>Rubber<br></dd>
                  <dt>Season</dt>
                  <dd>Winter<br></dd>
                  <dt>With Platforms</dt>
                  <dd>No<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Boot Height</dt>
                  <dd>Ankle<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Lace-Up<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Sunt temporibus velit</a>
            </h3>
            <p class="prod-i-price">
              <b>$115</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x504" alt="Fuga impedit inciduntipsa"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Gender</dt>
                  <dd>Women<br></dd>
                  <dt>Silhouette</dt>
                  <dd>Sheath<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester<br></dd>
                  <dt>Season</dt>
                  <dd>Autumn<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Waistline</dt>
                  <dd>Natural<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-3">-30%</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
              </div>
            </div>
            <h3>
              <a href="product.html">Fuga impedit inciduntipsa</a>
            </h3>
            <p class="prod-i-price">
              <b>$80</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/358x300" alt="Iusto labore laudantium"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Handbags Type</dt>
                  <dd>Shoulder Bags<br></dd>
                  <dt>Exterior</dt>
                  <dd>Silt Pocket<br></dd>
                  <dt>Material</dt>
                  <dd>Canvas<br></dd>
                  <dt>Occasion</dt>
                  <dd>Versatile<br></dd>
                  <dt>Shape</dt>
                  <dd>Casual Tote<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Hardness</dt>
                  <dd>Soft<br></dd>
                  <dt>Decoration</dt>
                  <dd>None<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-1">NEW</p>
                <br><p class="prod-sticker-2">HIT</p>
              </div>
            </div>
            <h3>
              <a href="product.html">Iusto labore laudantium</a>
            </h3>
            <p class="prod-i-price">
              <b>$170</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x303" alt="Reprehenderit rerum"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Outerwear Type</dt>
                  <dd>Jackets<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>Regular<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester,Cotton<br></dd>
                  <dt>Hooded</dt>
                  <dd>Yes<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Collar</dt>
                  <dd>Turn-down Collar<br></dd>
                  <dt>Decoration</dt>
                  <dd>Pockets<br></dd>
                  <dt>Gender</dt>
                  <dd>Boys<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-3">-20%</p>
              </div>
            </div>
            <h3>
              <a href="product.html">Reprehenderit rerum</a>
            </h3>
            <p class="prod-i-price">
              <b>$210</b>
              <del>$240</del>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x366" alt="Nulla numquam obcaecati"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Material</dt>
                  <dd>Cotton,Polyester<br></dd>
                  <dt>Sleeve Length</dt>
                  <dd>Short<br></dd>
                  <dt>Tops Type</dt>
                  <dd>Tees<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Hooded</dt>
                  <dd>No<br></dd>
                  <dt>Collar</dt>
                  <dd>V-Neck<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>General<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Nulla numquam obcaecati</a>
            </h3>
            <p class="prod-i-price">
              <b>$48</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x416" alt="Maxime molestias necessitatibus nobis"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Outerwear Type</dt>
                  <dd>Jackets<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>Regular<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester,Cotton<br></dd>
                  <dt>Hooded</dt>
                  <dd>Yes<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Collar</dt>
                  <dd>Turn-down Collar<br></dd>
                  <dt>Decoration</dt>
                  <dd>Pockets<br></dd>
                  <dt>Gender</dt>
                  <dd>Men<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Maxime molestias necessitatibus nobis</a>
            </h3>
            <p class="prod-i-price">
              <b>$95</b>
            </p>
          </div>
    
        </div>
  
      </div>
      <!-- Catalog Items | Full - end -->
      <div class="fr-pop-wrap">
        <h3 class="component-ttl"><span>Thời trang nam</span></h3>
      </div>
      <!-- Catalog Items | Full - start -->
      <div class="section-cont section-full">
    
        <div class="prod-items section-items">
      
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/378x300" alt="Sunt temporibus velit"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Gender</dt>
                  <dd>Men<br></dd>
                  <dt>Shaft Material</dt>
                  <dd>Flock<br></dd>
                  <dt>Lining Material</dt>
                  <dd>Plush<br></dd>
                  <dt>Insole Material</dt>
                  <dd>Rubber<br></dd>
                  <dt>Season</dt>
                  <dd>Winter<br></dd>
                  <dt>With Platforms</dt>
                  <dd>No<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Boot Height</dt>
                  <dd>Ankle<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Lace-Up<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Sunt temporibus velit</a>
            </h3>
            <p class="prod-i-price">
              <b>$115</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x504" alt="Fuga impedit inciduntipsa"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Gender</dt>
                  <dd>Women<br></dd>
                  <dt>Silhouette</dt>
                  <dd>Sheath<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester<br></dd>
                  <dt>Season</dt>
                  <dd>Autumn<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Waistline</dt>
                  <dd>Natural<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-3">-30%</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
              </div>
            </div>
            <h3>
              <a href="product.html">Fuga impedit inciduntipsa</a>
            </h3>
            <p class="prod-i-price">
              <b>$80</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/358x300" alt="Iusto labore laudantium"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Handbags Type</dt>
                  <dd>Shoulder Bags<br></dd>
                  <dt>Exterior</dt>
                  <dd>Silt Pocket<br></dd>
                  <dt>Material</dt>
                  <dd>Canvas<br></dd>
                  <dt>Occasion</dt>
                  <dd>Versatile<br></dd>
                  <dt>Shape</dt>
                  <dd>Casual Tote<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Hardness</dt>
                  <dd>Soft<br></dd>
                  <dt>Decoration</dt>
                  <dd>None<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-1">NEW</p>
                <br><p class="prod-sticker-2">HIT</p>
              </div>
            </div>
            <h3>
              <a href="product.html">Iusto labore laudantium</a>
            </h3>
            <p class="prod-i-price">
              <b>$170</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x303" alt="Reprehenderit rerum"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Outerwear Type</dt>
                  <dd>Jackets<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>Regular<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester,Cotton<br></dd>
                  <dt>Hooded</dt>
                  <dd>Yes<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Collar</dt>
                  <dd>Turn-down Collar<br></dd>
                  <dt>Decoration</dt>
                  <dd>Pockets<br></dd>
                  <dt>Gender</dt>
                  <dd>Boys<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-3">-20%</p>
              </div>
            </div>
            <h3>
              <a href="product.html">Reprehenderit rerum</a>
            </h3>
            <p class="prod-i-price">
              <b>$210</b>
              <del>$240</del>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x366" alt="Nulla numquam obcaecati"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Material</dt>
                  <dd>Cotton,Polyester<br></dd>
                  <dt>Sleeve Length</dt>
                  <dd>Short<br></dd>
                  <dt>Tops Type</dt>
                  <dd>Tees<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Hooded</dt>
                  <dd>No<br></dd>
                  <dt>Collar</dt>
                  <dd>V-Neck<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>General<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Nulla numquam obcaecati</a>
            </h3>
            <p class="prod-i-price">
              <b>$48</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x416" alt="Maxime molestias necessitatibus nobis"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Outerwear Type</dt>
                  <dd>Jackets<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>Regular<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester,Cotton<br></dd>
                  <dt>Hooded</dt>
                  <dd>Yes<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Collar</dt>
                  <dd>Turn-down Collar<br></dd>
                  <dt>Decoration</dt>
                  <dd>Pockets<br></dd>
                  <dt>Gender</dt>
                  <dd>Men<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Maxime molestias necessitatibus nobis</a>
            </h3>
            <p class="prod-i-price">
              <b>$95</b>
            </p>
          </div>
    
        </div>
  
      </div>
      <!-- Catalog Items | Full - end -->
      <div class="fr-pop-wrap">
        <h3 class="component-ttl"><span>Thời trang cho bé</span></h3>
      </div>
      <!-- Catalog Items | Full - start -->
      <div class="section-cont section-full">
    
        <div class="prod-items section-items">
      
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/378x300" alt="Sunt temporibus velit"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Gender</dt>
                  <dd>Men<br></dd>
                  <dt>Shaft Material</dt>
                  <dd>Flock<br></dd>
                  <dt>Lining Material</dt>
                  <dd>Plush<br></dd>
                  <dt>Insole Material</dt>
                  <dd>Rubber<br></dd>
                  <dt>Season</dt>
                  <dd>Winter<br></dd>
                  <dt>With Platforms</dt>
                  <dd>No<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Boot Height</dt>
                  <dd>Ankle<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Lace-Up<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Sunt temporibus velit</a>
            </h3>
            <p class="prod-i-price">
              <b>$115</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x504" alt="Fuga impedit inciduntipsa"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Gender</dt>
                  <dd>Women<br></dd>
                  <dt>Silhouette</dt>
                  <dd>Sheath<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester<br></dd>
                  <dt>Season</dt>
                  <dd>Autumn<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Waistline</dt>
                  <dd>Natural<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-3">-30%</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
              </div>
            </div>
            <h3>
              <a href="product.html">Fuga impedit inciduntipsa</a>
            </h3>
            <p class="prod-i-price">
              <b>$80</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/358x300" alt="Iusto labore laudantium"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Handbags Type</dt>
                  <dd>Shoulder Bags<br></dd>
                  <dt>Exterior</dt>
                  <dd>Silt Pocket<br></dd>
                  <dt>Material</dt>
                  <dd>Canvas<br></dd>
                  <dt>Occasion</dt>
                  <dd>Versatile<br></dd>
                  <dt>Shape</dt>
                  <dd>Casual Tote<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Hardness</dt>
                  <dd>Soft<br></dd>
                  <dt>Decoration</dt>
                  <dd>None<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-1">NEW</p>
                <br><p class="prod-sticker-2">HIT</p>
              </div>
            </div>
            <h3>
              <a href="product.html">Iusto labore laudantium</a>
            </h3>
            <p class="prod-i-price">
              <b>$170</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x303" alt="Reprehenderit rerum"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Outerwear Type</dt>
                  <dd>Jackets<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>Regular<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester,Cotton<br></dd>
                  <dt>Hooded</dt>
                  <dd>Yes<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Collar</dt>
                  <dd>Turn-down Collar<br></dd>
                  <dt>Decoration</dt>
                  <dd>Pockets<br></dd>
                  <dt>Gender</dt>
                  <dd>Boys<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-3">-20%</p>
              </div>
            </div>
            <h3>
              <a href="product.html">Reprehenderit rerum</a>
            </h3>
            <p class="prod-i-price">
              <b>$210</b>
              <del>$240</del>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x366" alt="Nulla numquam obcaecati"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Material</dt>
                  <dd>Cotton,Polyester<br></dd>
                  <dt>Sleeve Length</dt>
                  <dd>Short<br></dd>
                  <dt>Tops Type</dt>
                  <dd>Tees<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Hooded</dt>
                  <dd>No<br></dd>
                  <dt>Collar</dt>
                  <dd>V-Neck<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>General<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Nulla numquam obcaecati</a>
            </h3>
            <p class="prod-i-price">
              <b>$48</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x416" alt="Maxime molestias necessitatibus nobis"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Outerwear Type</dt>
                  <dd>Jackets<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>Regular<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester,Cotton<br></dd>
                  <dt>Hooded</dt>
                  <dd>Yes<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Collar</dt>
                  <dd>Turn-down Collar<br></dd>
                  <dt>Decoration</dt>
                  <dd>Pockets<br></dd>
                  <dt>Gender</dt>
                  <dd>Men<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Maxime molestias necessitatibus nobis</a>
            </h3>
            <p class="prod-i-price">
              <b>$95</b>
            </p>
          </div>
    
        </div>
  
      </div>
      <!-- Catalog Items | Full - end -->
      <div class="fr-pop-wrap">
        <h3 class="component-ttl"><span>Phụ kiện thời trang</span></h3>
      </div>
      <!-- Catalog Items | Full - start -->
      <div class="section-cont section-full">
    
        <div class="prod-items section-items">
      
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/378x300" alt="Sunt temporibus velit"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Gender</dt>
                  <dd>Men<br></dd>
                  <dt>Shaft Material</dt>
                  <dd>Flock<br></dd>
                  <dt>Lining Material</dt>
                  <dd>Plush<br></dd>
                  <dt>Insole Material</dt>
                  <dd>Rubber<br></dd>
                  <dt>Season</dt>
                  <dd>Winter<br></dd>
                  <dt>With Platforms</dt>
                  <dd>No<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Boot Height</dt>
                  <dd>Ankle<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Lace-Up<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Sunt temporibus velit</a>
            </h3>
            <p class="prod-i-price">
              <b>$115</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x504" alt="Fuga impedit inciduntipsa"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Gender</dt>
                  <dd>Women<br></dd>
                  <dt>Silhouette</dt>
                  <dd>Sheath<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester<br></dd>
                  <dt>Season</dt>
                  <dd>Autumn<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Waistline</dt>
                  <dd>Natural<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-3">-30%</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
              </div>
            </div>
            <h3>
              <a href="product.html">Fuga impedit inciduntipsa</a>
            </h3>
            <p class="prod-i-price">
              <b>$80</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/358x300" alt="Iusto labore laudantium"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Handbags Type</dt>
                  <dd>Shoulder Bags<br></dd>
                  <dt>Exterior</dt>
                  <dd>Silt Pocket<br></dd>
                  <dt>Material</dt>
                  <dd>Canvas<br></dd>
                  <dt>Occasion</dt>
                  <dd>Versatile<br></dd>
                  <dt>Shape</dt>
                  <dd>Casual Tote<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Hardness</dt>
                  <dd>Soft<br></dd>
                  <dt>Decoration</dt>
                  <dd>None<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-1">NEW</p>
                <br><p class="prod-sticker-2">HIT</p>
              </div>
            </div>
            <h3>
              <a href="product.html">Iusto labore laudantium</a>
            </h3>
            <p class="prod-i-price">
              <b>$170</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x303" alt="Reprehenderit rerum"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Outerwear Type</dt>
                  <dd>Jackets<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>Regular<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester,Cotton<br></dd>
                  <dt>Hooded</dt>
                  <dd>Yes<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Collar</dt>
                  <dd>Turn-down Collar<br></dd>
                  <dt>Decoration</dt>
                  <dd>Pockets<br></dd>
                  <dt>Gender</dt>
                  <dd>Boys<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
          
              <div class="prod-sticker">
                <p class="prod-sticker-3">-20%</p>
              </div>
            </div>
            <h3>
              <a href="product.html">Reprehenderit rerum</a>
            </h3>
            <p class="prod-i-price">
              <b>$210</b>
              <del>$240</del>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x366" alt="Nulla numquam obcaecati"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Material</dt>
                  <dd>Cotton,Polyester<br></dd>
                  <dt>Sleeve Length</dt>
                  <dd>Short<br></dd>
                  <dt>Tops Type</dt>
                  <dd>Tees<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Hooded</dt>
                  <dd>No<br></dd>
                  <dt>Collar</dt>
                  <dd>V-Neck<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>General<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Nulla numquam obcaecati</a>
            </h3>
            <p class="prod-i-price">
              <b>$48</b>
            </p>
          </div>
          <div class="prod-i">
            <div class="prod-i-top">
              <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/300x416" alt="Maxime molestias necessitatibus nobis"><!-- NO SPACE --></a>
              <p class="prod-i-info">
                <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
              </p>
              <a href="#" class="prod-i-buy">Add to cart</a>
              <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
          
              <div class="prod-i-properties">
                <dl>
                  <dt>Outerwear Type</dt>
                  <dd>Jackets<br></dd>
                  <dt>Sleeve Style</dt>
                  <dd>Regular<br></dd>
                  <dt>Pattern Type</dt>
                  <dd>Solid<br></dd>
                  <dt>Material</dt>
                  <dd>Polyester,Cotton<br></dd>
                  <dt>Hooded</dt>
                  <dd>Yes<br></dd>
                  <dt>Style</dt>
                  <dd>Casual<br></dd>
                  <dt>Collar</dt>
                  <dd>Turn-down Collar<br></dd>
                  <dt>Decoration</dt>
                  <dd>Pockets<br></dd>
                  <dt>Gender</dt>
                  <dd>Men<br></dd>
                  <dt>Closure Type</dt>
                  <dd>Zipper<br></dd>
                </dl>
              </div>
            </div>
            <h3>
              <a href="product.html">Maxime molestias necessitatibus nobis</a>
            </h3>
            <p class="prod-i-price">
              <b>$95</b>
            </p>
          </div>
    
        </div>
  
      </div>
      <!-- Catalog Items | Full - end -->
      
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