@extends('frontend.theme-ecommerce.template')

@section('title', 'Tìm kiếm sản phẩm')
@section('description', 'Tìm kiếm sản phẩm, cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <main>
    <section class="container">
      <ul class="b-crumbs">
        <li>
          <a href="{{ route('home') }}">Trang chủ</a>
        </li>
        <li><span>Tìm kiếm</span></li>
      </ul>
      <h1 class="main-ttl"><span>Từ khóa: {{ request()->query('q') }}</span></h1>
      <div class="section-sb">
        @include('frontend.theme-ecommerce.sidebar.filter')
        @include('frontend.theme-ecommerce.sidebar.menu', ['categories' => $categories])
      </div>
      @if($products->total() > 0)
        <div class="section-cont">
        <div class="section-top">
          <div class="section-mode">Tìm thấy: <strong>{{ $products->total() }}</strong> sản phẩm</div>
          <div class="section-sortby">
            <p>Sắp xếp</p>
            <ul>
              <li>
                <a href="{{ route('search.index', addParamsUrl(['sort' => 'new_desc']))  }}">Mới nhất</a>
              </li>
              <li>
                <a href="{{ route('search.index', addParamsUrl(['sort' => 'name_asc']))  }}">Sắp theo tên: A - Z</a>
              </li>
              <li>
                <a href="{{ route('search.index', addParamsUrl(['sort' => 'name_desc']))  }}">Sắp theo tên: Z - A</a>
              </li>
              <li>
                <a href="{{ route('search.index', addParamsUrl(['sort' => 'price_asc']))  }}">Giá tăng dần</a>
              </li>
              <li>
                <a href="{{ route('search.index', addParamsUrl(['sort' => 'price_desc']))  }}">Giá giảm dần</a>
              </li>
            </ul>
          </div>
          <div class="section-count">
            <p>{{ request()->query('limit') ?? 12 }}</p>
            <ul>
              <li><a href="{{ route('search.index', addParamsUrl(['limit' => 12]))  }}">12</a></li>
              <li><a href="{{ route('search.index', addParamsUrl(['limit' => 24]))  }}">24</a></li>
              <li><a href="{{ route('search.index', addParamsUrl(['limit' => 48]))  }}">48</a></li>
            </ul>
          </div>
        </div>
        <div class="prod-items section-items">
            @foreach($products as $product)
              <div class="prod-i">
                <div class="prod-i-top">
                  <a href="{{ route('product.show', $product->slug) }}" class="prod-i-img">
                    @if(!empty($product->pictures))
                      <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
                    @else
                      <img src="{{ asset('theme-ecommerce/img/354x236.png') }}" alt="{{ $product->name }}" title="{{ $product->name }}">
                    @endif
                  </a>
                  <p class="prod-i-info">
                    <a href="javascript:void(0)" class="qview-btn prod-i-qview" data-id="{{ $product->id }}"><span>Xem nhanh</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare compare_product" href="javascript:void(0)" data-id="{{ $product->id }}"><span>So sánh</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <a href="javascript:void(0)" class="prod-i-buy add_to_cart" data-id="{{ $product->id }}">Mua</a>
                  <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>

                  <div class="prod-i-properties">
                    {!! $product->short_description !!}
                  </div>
                  <div class="prod-sticker">
                    <p class="prod-sticker-1">Mới</p>
                    <br><p class="prod-sticker-2">Hot</p>
                  </div>
                </div>
                <h3>
                  <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                </h3>
                <p class="prod-i-price">
                  <b>{{ format_price($product->price) }}</b>
                  <del>{{ format_price($product->price) }}</del>
                </p>
              </div>
            @endforeach
          </div>
        {{ $products->appends(request()->query())->links('vendor.pagination.theme')  }}
      </div>
      @else
        <p class="section-cont">Không tìm thấy sản phẩm nào!</p>
      @endif
    </section>
  </main>
@endsection