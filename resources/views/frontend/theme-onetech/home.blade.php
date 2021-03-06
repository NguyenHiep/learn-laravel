@extends('frontend.theme-onetech.template')

@section('title', 'Trang chủ - Shop chuyên cung cấp sỉ và lẻ quần áo')
@section('description', 'Shop chuyên cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online')

@section('content')

  @isset($sliders)
      <!-- Banner -->
      <div class="banner">
        <div class="banner_background" style="background-image:url({{ asset('theme-onetech/images/banner_background.jpg') }})"></div>
        <div class="container fill_height">
          <div class="row fill_height">
            <div class="banner_product_image"><img src="{{ asset(UPLOAD_SLIDER . $sliders[0]->slider_img) }}" alt="{{$sliders[0]->slider_title}}"></div>
            <div class="col-lg-5 offset-lg-4 fill_height">
              <div class="banner_content">
                <h1 class="banner_text">{{ $sliders[0]->slider_title }}</h1>
{{--                <div class="banner_price"><span>$530</span>$460</div>--}}
                <div class="banner_product_name">{{ $sliders[0]->slider_content }}</div>
                <div class="button banner_button"><a href="{{ $sliders[0]->slider_url }}" target="{{ $sliders[0]->slider_target }}">Shop Now</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endisset

  <!-- Best Sellers -->
  <div class="best_sellers">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="tabbed_container">
            <div class="tabs clearfix tabs-right">
              <div class="new_arrivals_title">Hot Best Sellers</div>
              <ul class="clearfix">
                <li class="active">Top 20</li>
                <li>Audio & Video</li>
                <li>Laptops & Computers</li>
              </ul>
              <div class="tabs_line"><span></span></div>
            </div>

            <div class="bestsellers_panel panel active">

              <!-- Best Sellers Slider -->

              <div class="bestsellers_slider slider">

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_1.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_2.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Samsung J730F...</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_3.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Nomi Black White</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_4.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Samsung Charm Gold</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_5.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Beoplay H7</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_6.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Huawei MediaPad T3</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_1.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_2.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_3.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_4.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_5.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_6.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

              </div>
            </div>

            <div class="bestsellers_panel panel">

              <!-- Best Sellers Slider -->

              <div class="bestsellers_slider slider">

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_1.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_2.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_3.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_4.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_5.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_6.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_1.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_2.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_3.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_4.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_5.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_6.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

              </div>
            </div>

            <div class="bestsellers_panel panel">

              <!-- Best Sellers Slider -->

              <div class="bestsellers_slider slider">

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_1.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_2.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_3.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_4.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_5.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_6.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_1.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_2.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_3.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_4.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item discount">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_5.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

                <!-- Best Sellers Item -->
                <div class="bestsellers_item">
                  <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                    <div class="bestsellers_image"><img src="{{ asset('theme-onetech/images/best_6.png') }}" alt=""></div>
                    <div class="bestsellers_content">
                      <div class="bestsellers_category"><a href="#">Headphones</a></div>
                      <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                      <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="bestsellers_price discount">$225<span>$300</span></div>
                    </div>
                  </div>
                  <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                  <ul class="bestsellers_marks">
                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                    <li class="bestsellers_mark bestsellers_new">new</li>
                  </ul>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Adverts -->

  <div class="adverts">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 advert_col">

          <!-- Advert Item -->

          <div class="advert d-flex flex-row align-items-center justify-content-start">
            <div class="advert_content">
              <div class="advert_title"><a href="#">Trends 2018</a></div>
              <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
            </div>
            <div class="ml-auto"><div class="advert_image"><img src="{{ asset('theme-onetech/images/adv_1.png') }}" alt=""></div></div>
          </div>
        </div>

        <div class="col-lg-4 advert_col">

          <!-- Advert Item -->

          <div class="advert d-flex flex-row align-items-center justify-content-start">
            <div class="advert_content">
              <div class="advert_subtitle">Trends 2018</div>
              <div class="advert_title_2"><a href="#">Sale -45%</a></div>
              <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
            </div>
            <div class="ml-auto"><div class="advert_image"><img src="{{ asset('theme-onetech/images/adv_2.png') }}" alt=""></div></div>
          </div>
        </div>

        <div class="col-lg-4 advert_col">

          <!-- Advert Item -->

          <div class="advert d-flex flex-row align-items-center justify-content-start">
            <div class="advert_content">
              <div class="advert_title"><a href="#">Trends 2018</a></div>
              <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
            </div>
            <div class="ml-auto"><div class="advert_image"><img src="{{ asset('theme-onetech/images/adv_3.png') }}" alt=""></div></div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Trends -->

  <div class="trends">
    <div class="trends_background" style="background-image:url({{ asset('theme-onetech/images/trends_background.jpg') }})"></div>
    <div class="trends_overlay"></div>
    <div class="container">
      <div class="row">

        <!-- Trends Content -->
        <div class="col-lg-3">
          <div class="trends_container">
            <h2 class="trends_title">Trends 2018</h2>
            <div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
            <div class="trends_slider_nav">
              <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
              <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
            </div>
          </div>
        </div>

        <!-- Trends Slider -->
        <div class="col-lg-9">
          <div class="trends_slider_container">

            <!-- Trends Slider -->

            <div class="owl-carousel owl-theme trends_slider">

              <!-- Trends Slider Item -->
              <div class="owl-item">
                <div class="trends_item is_new">
                  <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('theme-onetech/images/trends_1.jpg') }}" alt=""></div>
                  <div class="trends_content">
                    <div class="trends_category"><a href="#">Smartphones</a></div>
                    <div class="trends_info clearfix">
                      <div class="trends_name"><a href="product.html">Jump White</a></div>
                      <div class="trends_price">$379</div>
                    </div>
                  </div>
                  <ul class="trends_marks">
                    <li class="trends_mark trends_discount">-25%</li>
                    <li class="trends_mark trends_new">new</li>
                  </ul>
                  <div class="trends_fav"><i class="fas fa-heart"></i></div>
                </div>
              </div>

              <!-- Trends Slider Item -->
              <div class="owl-item">
                <div class="trends_item">
                  <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('theme-onetech/images/trends_2.jpg') }}" alt=""></div>
                  <div class="trends_content">
                    <div class="trends_category"><a href="#">Smartphones</a></div>
                    <div class="trends_info clearfix">
                      <div class="trends_name"><a href="product.html">Samsung Charm...</a></div>
                      <div class="trends_price">$379</div>
                    </div>
                  </div>
                  <ul class="trends_marks">
                    <li class="trends_mark trends_discount">-25%</li>
                    <li class="trends_mark trends_new">new</li>
                  </ul>
                  <div class="trends_fav"><i class="fas fa-heart"></i></div>
                </div>
              </div>

              <!-- Trends Slider Item -->
              <div class="owl-item">
                <div class="trends_item is_new">
                  <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('theme-onetech/images/trends_3.jpg') }}" alt=""></div>
                  <div class="trends_content">
                    <div class="trends_category"><a href="#">Smartphones</a></div>
                    <div class="trends_info clearfix">
                      <div class="trends_name"><a href="product.html">DJI Phantom 3...</a></div>
                      <div class="trends_price">$379</div>
                    </div>
                  </div>
                  <ul class="trends_marks">
                    <li class="trends_mark trends_discount">-25%</li>
                    <li class="trends_mark trends_new">new</li>
                  </ul>
                  <div class="trends_fav"><i class="fas fa-heart"></i></div>
                </div>
              </div>

              <!-- Trends Slider Item -->
              <div class="owl-item">
                <div class="trends_item is_new">
                  <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('theme-onetech/images/trends_1.jpg') }}" alt=""></div>
                  <div class="trends_content">
                    <div class="trends_category"><a href="#">Smartphones</a></div>
                    <div class="trends_info clearfix">
                      <div class="trends_name"><a href="product.html">Jump White</a></div>
                      <div class="trends_price">$379</div>
                    </div>
                  </div>
                  <ul class="trends_marks">
                    <li class="trends_mark trends_discount">-25%</li>
                    <li class="trends_mark trends_new">new</li>
                  </ul>
                  <div class="trends_fav"><i class="fas fa-heart"></i></div>
                </div>
              </div>

              <!-- Trends Slider Item -->
              <div class="owl-item">
                <div class="trends_item">
                  <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('theme-onetech/images/trends_2.jpg') }}" alt=""></div>
                  <div class="trends_content">
                    <div class="trends_category"><a href="#">Smartphones</a></div>
                    <div class="trends_info clearfix">
                      <div class="trends_name"><a href="product.html">Jump White</a></div>
                      <div class="trends_price">$379</div>
                    </div>
                  </div>
                  <ul class="trends_marks">
                    <li class="trends_mark trends_discount">-25%</li>
                    <li class="trends_mark trends_new">new</li>
                  </ul>
                  <div class="trends_fav"><i class="fas fa-heart"></i></div>
                </div>
              </div>

              <!-- Trends Slider Item -->
              <div class="owl-item">
                <div class="trends_item is_new">
                  <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('theme-onetech/images/trends_3.jpg') }}" alt=""></div>
                  <div class="trends_content">
                    <div class="trends_category"><a href="#">Smartphones</a></div>
                    <div class="trends_info clearfix">
                      <div class="trends_name"><a href="product.html">Jump White</a></div>
                      <div class="trends_price">$379</div>
                    </div>
                  </div>
                  <ul class="trends_marks">
                    <li class="trends_mark trends_discount">-25%</li>
                    <li class="trends_mark trends_new">new</li>
                  </ul>
                  <div class="trends_fav"><i class="fas fa-heart"></i></div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Reviews -->

  <div class="reviews">
    <div class="container">
      <div class="row">
        <div class="col">

          <div class="reviews_title_container">
            <h3 class="reviews_title">Latest Reviews</h3>
            <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
          </div>

          <div class="reviews_slider_container">

            <!-- Reviews Slider -->
            <div class="owl-carousel owl-theme reviews_slider">

              <!-- Reviews Slider Item -->
              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div><div class="review_image"><img src="{{ asset('theme-onetech/images/review_1.jpg') }}" alt=""></div></div>
                  <div class="review_content">
                    <div class="review_name">Roberto Sanchez</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                  </div>
                </div>
              </div>

              <!-- Reviews Slider Item -->
              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div><div class="review_image"><img src="{{ asset('theme-onetech/images/review_2.jpg') }}" alt=""></div></div>
                  <div class="review_content">
                    <div class="review_name">Brandon Flowers</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                  </div>
                </div>
              </div>

              <!-- Reviews Slider Item -->
              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div><div class="review_image"><img src="{{ asset('theme-onetech/images/review_3.jpg') }}" alt=""></div></div>
                  <div class="review_content">
                    <div class="review_name">Emilia Clarke</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                  </div>
                </div>
              </div>

              <!-- Reviews Slider Item -->
              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div><div class="review_image"><img src="{{ asset('theme-onetech/images/review_1.jpg') }}" alt=""></div></div>
                  <div class="review_content">
                    <div class="review_name">Roberto Sanchez</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                  </div>
                </div>
              </div>

              <!-- Reviews Slider Item -->
              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div><div class="review_image"><img src="{{ asset('theme-onetech/images/review_2.jpg') }}" alt=""></div></div>
                  <div class="review_content">
                    <div class="review_name">Brandon Flowers</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                  </div>
                </div>
              </div>

              <!-- Reviews Slider Item -->
              <div class="owl-item">
                <div class="review d-flex flex-row align-items-start justify-content-start">
                  <div><div class="review_image"><img src="{{ asset('theme-onetech/images/review_3.jpg') }}" alt=""></div></div>
                  <div class="review_content">
                    <div class="review_name">Emilia Clarke</div>
                    <div class="review_rating_container">
                      <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                      <div class="review_time">2 day ago</div>
                    </div>
                    <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                  </div>
                </div>
              </div>

            </div>
            <div class="reviews_dots"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Recently Viewed -->

  <div class="viewed">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="viewed_title_container">
            <h3 class="viewed_title">Recently Viewed</h3>
            <div class="viewed_nav_container">
              <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
              <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
            </div>
          </div>

          <div class="viewed_slider_container">

            <!-- Recently Viewed Slider -->

            <div class="owl-carousel owl-theme viewed_slider">

            <?php
            for($i = 1; $i <=6; $i++) {
            ?>
            <!-- Recently Viewed Item -->
              <div class="owl-item">
                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                  <div class="viewed_image"><img src="{{ asset('theme-onetech/images/view_'.$i.'.jpg') }}" alt=""></div>
                  <div class="viewed_content text-center">
                    <div class="viewed_price">$225<span>$300</span></div>
                    <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                  </div>
                  <ul class="item_marks">
                    <li class="item_mark item_discount">-25%</li>
                    <li class="item_mark item_new">new</li>
                  </ul>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Brands -->

  <div class="brands">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="brands_slider_container">

            <!-- Brands Slider -->

            <div class="owl-carousel owl-theme brands_slider">
              <?php
              for($i=1; $i<=8; $i++){
              ?>
              <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('theme-onetech/images/brands_'.$i.'.jpg') }}" alt=""></div></div>
              <?php
              }
              ?>
            </div>

            <!-- Brands Slider Navigation -->
            <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
            <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection