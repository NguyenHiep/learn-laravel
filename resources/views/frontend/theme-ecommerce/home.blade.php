@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container">
      @if(count($sliders))
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
      @include('frontend.theme-ecommerce.template-parts.loop-product-slider', ['datas' => ['category_name' => 'Giá sỉ nổi bật', 'tabs' => $tabs]])
      @include('frontend.theme-ecommerce.template-parts.loop-product', ['datas' => ['category_name' => 'Thời trang nữ', 'products' => $thoitrang_nu]])
      @include('frontend.theme-ecommerce.template-parts.loop-product', ['datas' => ['category_name' => 'Thời trang nữ', 'products' => $thoitrang_nu]])
      @include('frontend.theme-ecommerce.template-parts.loop-product', ['datas' => ['category_name' => 'Thời trang nam', 'products' => $thoitrang_nam]])
      @include('frontend.theme-ecommerce.template-parts.loop-product', ['datas' => ['category_name' => 'Thời trang cho bé', 'products' => $thoitrang_chobe]])
      @include('frontend.theme-ecommerce.template-parts.loop-product', ['datas' => ['category_name' => 'Phụ kiện thời trang', 'products' => $phukien_thoitrang]])
    </section>
  </main>
  <!-- Main Content - end -->
@endsection