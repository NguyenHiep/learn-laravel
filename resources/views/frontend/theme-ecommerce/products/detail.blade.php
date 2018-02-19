@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container">
      <!-- Slider -->
      <div class="fr-slider-wrap">
        <div class="fr-slider">
          <ul class="slides">
            <li>
              <img src="img/slider/slide1.jpg" alt="">
              <div class="fr-slider-cont">
                <h3>MEGA SALE -30%</h3>
                <p>Winter collection for women's. <br>We all have choices for you. Check it out!</p>
                <p class="fr-slider-more-wrap">
                  <a class="fr-slider-more" href="#">View collection</a>
                </p>
              </div>
            </li>
            <li>
              <img src="img/slider/slide1.jpg" alt="">
              <div class="fr-slider-cont">
                <h3>NEW COLLECTION</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>Aliquam consequuntur dolorem doloribus fuga harum</p>
                <p class="fr-slider-more-wrap">
                  <a class="fr-slider-more" href="#">Shopping now</a>
                </p>
              </div>
            </li>
            <li>
              <img src="img/slider/slide1.jpg" alt="">
              <div class="fr-slider-cont">
                <h3>SUMMER TRENDS</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>Aliquam consequuntur dolorem doloribus fuga harum</p>
                <p class="fr-slider-more-wrap">
                  <a class="fr-slider-more" href="#">Start shopping</a>
                </p>
              </div>
            </li>
          </ul>
        </div>
      </div>
      
      
      <!-- Popular Products -->
      <div class="fr-pop-wrap">
        
        <h3 class="component-ttl"><span>Popular products</span></h3>
        
        <ul class="fr-pop-tabs sections-show">
          <li><a data-frpoptab-num="1" data-frpoptab="#frpoptab-tab-1" href="#" class="active">All Categories</a></li>
          <li><a data-frpoptab-num="2" data-frpoptab="#frpoptab-tab-2" href="#">Women</a></li>
          <li><a data-frpoptab-num="3" data-frpoptab="#frpoptab-tab-3" href="#">Men</a></li>
          <li><a data-frpoptab-num="4" data-frpoptab="#frpoptab-tab-4" href="#">Kids</a></li>
          <li><a data-frpoptab-num="5" data-frpoptab="#frpoptab-tab-5" href="#">Shoes</a></li>
        </ul>
        
        <div class="fr-pop-tab-cont">
          
          <p data-frpoptab-num="1" class="fr-pop-tab-mob active" data-frpoptab="#frpoptab-tab-1">All Categories</p>
          <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-1">
            
            <ul class="slides">
              
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x350" alt="Aspernatur excepturi rem"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x302" alt="Amet tempore unde"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x422" alt="Nisi provident atque"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Nisi provident atque</a>
                </h3>
                <p class="prod-i-price">
                  <b>$130</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x385" alt="Eveniet nobis minus possimus"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
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
                  <a href="product.html">Eveniet nobis minus possimus</a>
                </h3>
                <p class="prod-i-price">
                  <b>$80</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x288" alt="Quis ex fugiat blanditiis"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Go to detail</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Quis ex fugiat blanditiis</a>
                </h3>
                <p class="prod-i-price">
                  <b>$150</b>
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
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x279" alt="Nisi autem error"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Nisi autem error</a>
                </h3>
                <p class="prod-i-price">
                  <b>$65</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x403" alt="Quod soluta corrupti"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Quod soluta corrupti</a>
                </h3>
                <p class="prod-i-price">
                  <b>$175</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x280" alt="Ipsa doloremque"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Ipsa doloremque</a>
                </h3>
                <p class="prod-i-price">
                  <b>$85</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x409" alt="Dignissimos fuga"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Dignissimos fuga</a>
                </h3>
                <p class="prod-i-price">
                  <b>$205</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/252x250" alt="Nisi autem error"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Go to detail</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Nisi autem error</a>
                </h3>
                <p class="prod-i-price">
                  <b>$95</b>
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
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/316x250" alt="Tempora ea ratione vel"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                  
                  <div class="prod-sticker">
                    <p class="prod-sticker-2">HIT</p>
                  </div>
                </div>
                <h3>
                  <a href="product.html">Tempora ea ratione vel</a>
                </h3>
                <p class="prod-i-price">
                  <b>$120</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/281x250" alt="Minus sequi iste"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Minus sequi iste</a>
                </h3>
                <p class="prod-i-price">
                  <b>$135</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/265x250" alt="Dignissimos fuga voluptates totam"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Dignissimos fuga voluptates totam</a>
                </h3>
                <p class="prod-i-price">
                  <b>$85</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/291x250" alt="Perferendis recusandae"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Perferendis recusandae</a>
                </h3>
                <p class="prod-i-price">
                  <b>$70</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/277x250" alt="Officiis nihil culpa"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Officiis nihil culpa</a>
                </h3>
                <p class="prod-i-price">
                  <b>$180</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/295x250" alt="Distinctio modi quos"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Distinctio modi quos</a>
                </h3>
                <p class="prod-i-price">
                  <b>$195</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/301x250" alt="Corrupti velit vero"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Corrupti velit vero</a>
                </h3>
                <p class="prod-i-price">
                  <b>$220</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/289x250" alt="Dicta doloremque hic"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                </div>
                <h3>
                  <a href="product.html">Dicta doloremque hic</a>
                </h3>
                <p class="prod-i-price">
                  <b>$90</b>
                </p>
              </li>
            
            </ul>
          
          </div>
          
          <p data-frpoptab-num="2" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-2">Kids</p>
          <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-2">
            
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
          
          <p data-frpoptab-num="3" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-3">Women</p>
          <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-3">
            
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
          
          <p data-frpoptab-num="4" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-4">Men</p>
          <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-4">
            
            <ul class="slides">
              
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x422" alt="Nisi provident atque"><!-- NO SPACE --></a>
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
                  <a href="product.html">Nisi provident atque</a>
                </h3>
                <p class="prod-i-price">
                  <b>$130</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x385" alt="Eveniet nobis minus possimus"><!-- NO SPACE --></a>
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
                  <a href="product.html">Eveniet nobis minus possimus</a>
                </h3>
                <p class="prod-i-price">
                  <b>$80</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x288" alt="Quis ex fugiat blanditiis"><!-- NO SPACE --></a>
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
                  <a href="product.html">Quis ex fugiat blanditiis</a>
                </h3>
                <p class="prod-i-price">
                  <b>$150</b>
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
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x279" alt="Nisi autem error"><!-- NO SPACE --></a>
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
                  <a href="product.html">Nisi autem error</a>
                </h3>
                <p class="prod-i-price">
                  <b>$65</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x403" alt="Quod soluta corrupti"><!-- NO SPACE --></a>
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
                  <a href="product.html">Quod soluta corrupti</a>
                </h3>
                <p class="prod-i-price">
                  <b>$175</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x280" alt="Ipsa doloremque"><!-- NO SPACE --></a>
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
                  <a href="product.html">Ipsa doloremque</a>
                </h3>
                <p class="prod-i-price">
                  <b>$85</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/250x409" alt="Dignissimos fuga"><!-- NO SPACE --></a>
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
                  <a href="product.html">Dignissimos fuga</a>
                </h3>
                <p class="prod-i-price">
                  <b>$205</b>
                </p>
              </li>
            
            </ul>
          
          </div>
          
          
          <p data-frpoptab-num="5" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-5">Shoes</p>
          <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-5">
            
            <ul class="slides">
              
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/252x250" alt="Nisi autem error"><!-- NO SPACE --></a>
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
                  <a href="product.html">Nisi autem error</a>
                </h3>
                <p class="prod-i-price">
                  <b>$95</b>
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
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/316x250" alt="Tempora ea ratione vel"><!-- NO SPACE --></a>
                  <p class="prod-i-info">
                    <a href="#" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                    <a href="#" class="prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="#" class="prod-i-add">Add to cart</a>
                  </p>
                  
                  <div class="prod-sticker">
                    <p class="prod-sticker-2">HIT</p>
                  </div>
                </div>
                <h3>
                  <a href="product.html">Tempora ea ratione vel</a>
                </h3>
                <p class="prod-i-price">
                  <b>$120</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/281x250" alt="Minus sequi iste"><!-- NO SPACE --></a>
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
                  <a href="product.html">Minus sequi iste</a>
                </h3>
                <p class="prod-i-price">
                  <b>$135</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/265x250" alt="Dignissimos fuga voluptates totam"><!-- NO SPACE --></a>
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
                  <a href="product.html">Dignissimos fuga voluptates totam</a>
                </h3>
                <p class="prod-i-price">
                  <b>$85</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/291x250" alt="Perferendis recusandae"><!-- NO SPACE --></a>
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
                  <a href="product.html">Perferendis recusandae</a>
                </h3>
                <p class="prod-i-price">
                  <b>$70</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/277x250" alt="Officiis nihil culpa"><!-- NO SPACE --></a>
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
                  <a href="product.html">Officiis nihil culpa</a>
                </h3>
                <p class="prod-i-price">
                  <b>$180</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/295x250" alt="Distinctio modi quos"><!-- NO SPACE --></a>
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
                  <a href="product.html">Distinctio modi quos</a>
                </h3>
                <p class="prod-i-price">
                  <b>$195</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/301x250" alt="Corrupti velit vero"><!-- NO SPACE --></a>
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
                  <a href="product.html">Corrupti velit vero</a>
                </h3>
                <p class="prod-i-price">
                  <b>$220</b>
                </p>
              </li>
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="product.html" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/289x250" alt="Dicta doloremque hic"><!-- NO SPACE --></a>
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
                  <a href="product.html">Dicta doloremque hic</a>
                </h3>
                <p class="prod-i-price">
                  <b>$90</b>
                </p>
              </li>
            
            </ul>
          
          </div>
        
        
        </div><!-- .fr-pop-tab-cont -->
      
      
      </div><!-- .fr-pop-wrap -->
      
      
      <!-- Banners -->
      <div class="banners-wrap">
        <div class="banners-list">
          <div class="banner-i style_11">
            <span class="banner-i-bg" style="background: url(http://placehold.it/560x360);"></span>
            <div class="banner-i-cont">
              <p class="banner-i-subttl">NEW COLLECTION</p>
              <h3 class="banner-i-ttl">MEN'S<br>CLOTHING</h3>
              <p class="banner-i-link"><a href="section.html">View More</a></p>
            </div>
          </div>
          <div class="banner-i style_22">
            <span class="banner-i-bg" style="background: url(http://placehold.it/270x360);"></span>
            <div class="banner-i-cont">
              <p class="banner-i-subttl">GREAT COLLECTION</p>
              <h3 class="banner-i-ttl">CLOTHING<br>ACCESSORIES</h3>
              <p class="banner-i-link"><a href="section.html">Show more</a></p>
            </div>
          </div>
          <div class="banner-i style_21">
            <span class="banner-i-bg" style="background: url(http://placehold.it/270x360);"></span>
            <div class="banner-i-cont">
              <h3 class="banner-i-ttl">SPORT<br>CLOTHES</h3>
              <p class="banner-i-link"><a href="section.html">Go to catalog</a></p>
            </div>
          </div>
          <div class="banner-i style_21">
            <span class="banner-i-bg" style="background: url(http://placehold.it/270x360);"></span>
            <div class="banner-i-cont">
              <h3 class="banner-i-ttl">MEN AND <br>WOMEN SHOES</h3>
              <p class="banner-i-link"><a href="section.html">View More</a></p>
            </div>
          </div>
          <div class="banner-i style_22">
            <span class="banner-i-bg" style="background: url(http://placehold.it/270x360);"></span>
            <div class="banner-i-cont">
              <p class="banner-i-subttl">DISCOUNT -20%</p>
              <h3 class="banner-i-ttl">HATS<br>COLLECTION</h3>
              <p class="banner-i-link"><a href="section.html">Shop now</a></p>
            </div>
          </div>
          <div class="banner-i style_12">
            <span class="banner-i-bg" style="background: url(http://placehold.it/560x360);"></span>
            <div class="banner-i-cont">
              <p class="banner-i-subttl">STYLISH CLOTHES</p>
              <h3 class="banner-i-ttl">WOMEN'S COLLECTION</h3>
              <p>A great selection of dresses, <br>blouses and women's suits</p>
              <p class="banner-i-link"><a href="section.html">View More</a></p>
            </div>
          </div>
        </div>
      </div>
      
      
      <!-- Special offer -->
      <div class="discounts-wrap">
        <h3 class="component-ttl"><span>Special offer</span></h3>
        <div class="flexslider discounts-list">
          <ul class="slides">
            <li class="discounts-i">
              <a href="product.html" class="discounts-i-img">
                <img src="http://placehold.it/120x120" alt="Dicta doloremque">
              </a>
              <h3 class="discounts-i-ttl">
                <a href="product.html">Dicta doloremque</a>
              </h3>
              <p class="discounts-i-price">
                <b>$115</b> <del>$135</del>
              </p>
            </li>
            <li class="discounts-i">
              <a href="product.html" class="discounts-i-img">
                <img src="http://placehold.it/99x120" alt="Similique delectus">
              </a>
              <h3 class="discounts-i-ttl">
                <a href="product.html">Similique delectus</a>
              </h3>
              <p class="discounts-i-price">
                <b>$105</b> <del>$120</del>
              </p>
            </li>
            <li class="discounts-i">
              <a href="product.html" class="discounts-i-img">
                <img src="http://placehold.it/75x120" alt="Adipisci nemo">
              </a>
              <h3 class="discounts-i-ttl">
                <a href="product.html">Adipisci nemo</a>
              </h3>
              <p class="discounts-i-price">
                <b>$70</b> <del>$90</del>
              </p>
            </li>
            <li class="discounts-i">
              <a href="product.html" class="discounts-i-img">
                <img src="http://placehold.it/65x120" alt="Ullam harum">
              </a>
              <h3 class="discounts-i-ttl">
                <a href="product.html">Ullam harum</a>
              </h3>
              <p class="discounts-i-price">
                <b>$55</b> <del>$75</del>
              </p>
            </li>
            <li class="discounts-i">
              <a href="product.html" class="discounts-i-img">
                <img src="http://placehold.it/78x120" alt="Similique delectus">
              </a>
              <h3 class="discounts-i-ttl">
                <a href="product.html">Similique delectus</a>
              </h3>
              <p class="discounts-i-price">
                <b>$135</b> <del>$155</del>
              </p>
            </li>
            <li class="discounts-i">
              <a href="product.html" class="discounts-i-img">
                <img src="http://placehold.it/81x120" alt="Туфли Dr.Koffer">
              </a>
              <h3 class="discounts-i-ttl">
                <a href="product.html">Туфли Dr.Koffer</a>
              </h3>
              <p class="discounts-i-price">
                <b>$190</b> <del>$210</del>
              </p>
            </li>
            <li class="discounts-i">
              <a href="product.html" class="discounts-i-img">
                <img src="http://placehold.it/117x120" alt="Quod consequatur">
              </a>
              <h3 class="discounts-i-ttl">
                <a href="product.html">Quod consequatur</a>
              </h3>
              <p class="discounts-i-price">
                <b>$120</b> <del>$140</del>
              </p>
            </li>
            <li class="discounts-i">
              <a href="product.html" class="discounts-i-img">
                <img src="http://placehold.it/80x120" alt="Dolore fugit">
              </a>
              <h3 class="discounts-i-ttl">
                <a href="product.html">Dolore fugit</a>
              </h3>
              <p class="discounts-i-price">
                <b>$80</b> <del>$95</del>
              </p>
            </li>
          </ul>
        </div>
        <div class="discounts-info">
          <p>Special offer!<br>Limited time only</p>
          <a href="catalog-list.html">Shop now</a>
        </div>
      </div>
      
      
      <!-- Latest news -->
      <div class="posts-wrap">
        <div class="posts-list">
          <div class="posts-i">
            <a class="posts-i-img" href="post.html">
              <span style="background: url(http://placehold.it/354x236)"></span>
            </a>
            <time class="posts-i-date" datetime="2016-11-09 00:00:00"><span>30</span> Jan</time>
            <div class="posts-i-info">
              <a href="blog.html" class="posts-i-ctg">Reviews</a>
              <h3 class="posts-i-ttl">
                <a href="post.html">Animi quaerat at</a>
              </h3>
            </div>
          </div>
          <div class="posts-i">
            <a class="posts-i-img" href="post.html">
              <span style="background: url(http://placehold.it/354x236)"></span>
            </a>
            <time class="posts-i-date" datetime="2016-11-09 00:00:00"><span>29</span> Jan</time>
            <div class="posts-i-info">
              <a href="blog.html" class="posts-i-ctg">Articles</a>
              <h3 class="posts-i-ttl">
                <a href="post.html">Ex atque commodi</a>
              </h3>
            </div>
          </div>
          <div class="posts-i">
            <a class="posts-i-img" href="post.html">
              <span style="background: url(http://placehold.it/354x236)"></span>
            </a>
            <time class="posts-i-date" datetime="2016-11-09 00:00:00"><span>25</span> Jan</time>
            <div class="posts-i-info">
              <a href="blog.html" class="posts-i-ctg">News</a>
              <h3 class="posts-i-ttl">
                <a href="post.html">Hic quod maxime deserunt</a>
              </h3>
            </div>
          </div>
        </div>
      </div>
      
      
      <!-- Testimonials -->
      <div class="reviews-wrap">
        <div class="reviewscar-wrap">
          <div class="swiper-container reviewscar">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
              </div>
              <div class="swiper-slide">
                <p>Corrupti velit, vero esse, aperiam error magni illum quos, accusantium debitis et possimus recusandae tempora ad itaque dolorem veniam non voluptatem impedit iste? Dicta doloremque hic porro aspernatur. Dolores eligendi similique, cumque, eius veritatis</p>
              </div>
              <div class="swiper-slide">
                <p>Distinctio modi, quos, vero quibusdam ab deserunt doloribus eligendi velit temporibus ratione at est officia repellat? Adipisci nemo expedita rerum distinctio laudantium nihil voluptatem ullam vel ex magnam velit aliquid voluptate voluptatum excepturi</p>
              </div>
              <div class="swiper-slide">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
              </div>
              <div class="swiper-slide">
                <p>Similique delectus totam ex cum magnam quasi, ipsam officiis amet temporibus enim modi rerum quo maxime reprehenderit, deserunt, libero quas distinctio quos! Ullam harum nesciunt omnis consectetur distinctio? Iste sunt, dolorem deserunt quibusdam</p>
              </div>
              <div class="swiper-slide">
                <p>Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi. Minus sequi iste, nam nobis, excepturi nihil consequuntur reprehenderit ipsam, quam consequatur in. Esse, doloremque consectetur veniam quo ut voluptas necessitatibus</p>
              </div>
              <div class="swiper-slide">
                <p>Perferendis recusandae consequuntur quasi, non culpa. Minus porro officiis veniam facilis praesentium expedita doloribus, recusandae aut dolore autem, modi consequuntur rem perferendis dolores quisquam, sequi quas. Iusto et, eius laboriosam beatae</p>
              </div>
              <div class="swiper-slide">
                <p>Aliquid soluta nisi incidunt, dolores sequi itaque sunt et nesciunt delectus ipsam est molestias illo obcaecati, totam ducimus cumque consequuntur modi, laudantium! Temporibus vero odit quis, quibusdam maiores voluptatum sunt dolor tempora architecto fugiat quam.</p>
              </div>
              <div class="swiper-slide">
                <p>Ea reiciendis modi, molestiae dolores beatae facere quas	consequatur delectus ducimus, magni voluptates, eius, quia unde ut vitae doloribus illum! Optio saepe, modi aliquid perferendis veniam</p>
              </div>
              <div class="swiper-slide">
                <p>Ea reiciendis modi, molestiae dolores beatae facere quas	consequatur delectus ducimus, magni voluptates, eius, quia unde ut vitae doloribus illum! Optio saepe, modi aliquid perferendis veniam</p>
              </div>
              <div class="swiper-slide">
                <p>Quod soluta corrupti earum officia vel inventore vitae quidem, consequuntur odit impedit, eaque dolorem odio praesentium iusto amet voluptatum distinctio iste dicta maiores doloremque porro. Ipsa doloremque illum animi laborum quo in nemo delectus</p>
              </div>
              <div class="swiper-slide">
                <p>Eveniet nobis minus possimus eius, doloribus ex similique debitis nihil at facere delectus unde, commodi, alias. Eius facilis, dolore officia veritatis, doloribus voluptatem aliquid rem corporis quam officiis at dignissimos dolorum, velit assumenda</p>
              </div>
            </div>
          </div>
          <div class="swiper-container reviewscar-thumbs">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Aureole Jayde">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Aureole Jayde</a></h3>
                <p class="reviewscar-post">Director</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Benjy Darrin">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Benjy Darrin</a></h3>
                <p class="reviewscar-post">Designer</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Jeni Margie">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Jeni Margie</a></h3>
                <p class="reviewscar-post">Developer</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Edweena Chelsea">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Edweena Chelsea</a></h3>
                <p class="reviewscar-post">Manager</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Sean Rudolph">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Sean Rudolph</a></h3>
                <p class="reviewscar-post">Designer</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Brigham Murphy">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Brigham Murphy</a></h3>
                <p class="reviewscar-post">Director</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Barrie Roderick">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Barrie Roderick</a></h3>
                <p class="reviewscar-post">Developer</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="John Doe">
                <h3 class="reviewscar-ttl"><a href="reviews.html">John Doe</a></h3>
                <p class="reviewscar-post">Manager</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Shirlee Annabel">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Shirlee Annabel</a></h3>
                <p class="reviewscar-post">Developer</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Lettice Alyce">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Lettice Alyce</a></h3>
                <p class="reviewscar-post">Director</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Meriel Glory">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Meriel Glory</a></h3>
                <p class="reviewscar-post">Manager</p>
              </div>
              <div class="swiper-slide">
                <img src="http://placehold.it/120x120" alt="Janene Alaina">
                <h3 class="reviewscar-ttl"><a href="reviews.html">Janene Alaina</a></h3>
                <p class="reviewscar-post">Manager</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Subscribe Form -->
      <div class="newsletter">
        <h3>Subscribe to us</h3>
        <p>Enter your email if you want to receive our news</p>
        <form action="#">
          <input placeholder="Your e-mail" type="text">
          <input name="OK" value="Subscribe" type="submit">
        </form>
      </div>
      
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