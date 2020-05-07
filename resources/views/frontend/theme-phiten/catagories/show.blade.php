@extends('frontend.theme-phiten.template')

@section('title', 'Chuyên mục '. strtolower($category->name))
@section('description', 'Chuyên mục '.strtolower($category->name).', cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@push('meta')
  <meta name="title" content="Chuyên mục {{ strtolower($category->name) }} - shop chuyên cung cấp sỉ và lẻ quần áo">
  <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
  <meta name="description" content="Chuyên mục {{ strtolower($category->name) }} - shop chuyên cung cấp sỉ và lẻ quần áo">
  <meta property="og:title" content="Chuyên mục {{ strtolower($category->name) }} - shop chuyên cung cấp sỉ và lẻ quần áo">
  <meta property="og:description" content="Chuyên mục {{ strtolower($category->name) }} - shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

{{--@section('breadcrumb')--}}
{{--  <li class="active"><a href="javascript:void(0)">{{ 'Chuyên mục '. strtolower($category->name) }}</a></li>--}}
{{--@endsection--}}

@section('content')
  <!-- Main Content - start -->
{{--  <main>--}}
{{--    <section class="container">--}}
{{--      <ul class="b-crumbs">--}}
{{--        <li>--}}
{{--          <a href="{{ route('home') }}">--}}
{{--            Trang chủ--}}
{{--          </a>--}}
{{--        </li>--}}
{{--        --}}
{{--        <li>--}}
{{--          <span>{{ $category->name }}</span>--}}
{{--        </li>--}}
{{--      </ul>--}}
{{--      <h1 class="main-ttl"><span>{{ $category->name }}</span></h1>--}}
{{--      --}}
{{--      <!-- Catalog Sidebar - start -->--}}
{{--      <div class="section-sb">--}}
{{--        @include('frontend.theme-ecommerce.sidebar.filter')--}}
{{--        @include('frontend.theme-ecommerce.sidebar.menu', ['categories' => $categories])--}}
{{--      </div>--}}
{{--      <!-- Catalog Sidebar - end -->--}}
{{--      <!-- Catalog Items | Gallery V1 - start -->--}}
{{--      <div class="section-cont">--}}
{{--        --}}
{{--        <!-- Catalog Topbar - start -->--}}
{{--        <div class="section-top">--}}
{{--          <!-- View Mode -->--}}
{{--          <ul class="section-mode">--}}
{{--            <li class="section-mode-gallery @if($mode == 'gallery') active @endif "><a title="View mode: Gallery" href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'mode' => 'gallery'])) }}"></a></li>--}}
{{--            <li class="section-mode-list @if($mode == 'list') active @endif "><a title="View mode: List" href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'mode' => 'list'])) }}"></a></li>--}}
{{--            <li class="section-mode-table @if($mode == 'table') active @endif "><a title="View mode: Table" href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'mode' => 'table'])) }}"></a></li>--}}
{{--          </ul>--}}
{{--          --}}
{{--          <!-- Sorting -->--}}
{{--          <div class="section-sortby">--}}
{{--            <p>Sắp xếp</p>--}}
{{--            <ul>--}}
{{--              <li>--}}
{{--                <a href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'sort' => 'new_desc']))  }}">Mới nhất</a>--}}
{{--              </li>--}}
{{--              <li>--}}
{{--                <a href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'sort' => 'name_asc']))  }}">Sắp theo tên: A - Z</a>--}}
{{--              </li>--}}
{{--              <li>--}}
{{--                <a href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'sort' => 'name_desc']))  }}">Sắp theo tên: Z - A</a>--}}
{{--              </li>--}}
{{--              <li>--}}
{{--                <a href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'sort' => 'price_asc']))  }}">Giá tăng dần</a>--}}
{{--              </li>--}}
{{--              <li>--}}
{{--                <a href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'sort' => 'price_desc']))  }}">Giá giảm dần</a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--          --}}
{{--          <!-- Count per page -->--}}
{{--          <div class="section-count">--}}
{{--            <p>12</p>--}}
{{--            <ul>--}}
{{--              <li><a href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'limit' => 12]))  }}">12</a></li>--}}
{{--              <li><a href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'limit' => 24])) }}">24</a></li>--}}
{{--              <li><a href="{{ route('category.show', addParamsUrl(['slug' => $category->slug, 'limit' => 48]))  }}">48</a></li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        --}}
{{--        </div>--}}
{{--        <!-- Catalog Topbar - end -->--}}
{{--        @include('frontend.theme-ecommerce.catagories.mode-view.'.$mode, ['products' => $products])--}}
{{--        <!-- Pagination - start -->--}}
{{--        {{ $products->appends(request()->query())->links('vendor.pagination.theme')  }}--}}
{{--        <!-- Pagination - end -->--}}
{{--      </div>--}}
{{--      <!-- Catalog Items | Gallery V1 - end -->--}}
{{--      --}}
{{--      --}}
{{--    </section>--}}
{{--  </main>--}}
  <!-- Main Content - end -->
  <main id="main">
    <div class="container">
      <div class="row end">
        <div class="col-lg-9 product_list_content">
          <div class="topresults clearfix">
            <div class="results"><span class="cl1 b">{{ $products->total() }}</span> Sản phẩm được tìm thấy</div>
            <div class="search-result-right pull-right orderby">
              <div class="form-group">
                <select class="custom-select-black select" onchange="location = this.value">
                  <option value="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'topRated']) }}" {{ $sort === 'topRated' ? 'selected="selected"' : '' }}>Xếp hạng hàng đầu</option>
                  <option value="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'latest']) }}" {{ $sort === 'latest' ? 'selected="selected"' : '' }}>Mới nhất</option>
                  <option value="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'priceLowToHigh']) }}" {{ $sort === 'priceLowToHigh'? 'selected="selected"' : '' }}>Giá: từ thấp đến cao</option>
                  <option value="{{ route('category.show', ['slug' => $category->slug, 'sort' => 'priceHighToLow']) }}" {{ $sort === 'priceHighToLow' ? 'selected="selected"' : '' }}>Giá: từ cao đến thấp</option>
                </select>
              </div>
            </div>
          </div>

          <div class="product-list-result mainproduct lists-1 lists-1-hover">
            <div class="row grid-space-0">
              @if($products->total() > 1)
                @foreach($products as $product)
                  <div class="col-6 col-sm-6 col-md-3">
                    <div class="item">
                      <div class="img">
                        <img class="lazy-hidden" data-lazy-type="image" data-lazy-src="{{ asset(UPLOAD_PRODUCT . $product->pictures) }}"  alt="{{ $product->name }}"  />
                        <div class="groupbtn">
                          <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="btn btn2 sm"> View Detail</a>
                          <div class="group">
                            <span class="gitem like"><i class="icon-heart"></i></span>
                            <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="gitem cart"><i class="icon-cart"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="divtext">
                        <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="title equal_{{ $loop->iteration }}">{{ $product->name }}</a>
                        <p class="price"> {{ format_price($product->sale_price) }} </p>
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
            @if($products->lastPage() > 1)
              <div class="pages">
                {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-4')  }}
              </div>
            @endif

          </div>
        </div>
        <div class="col-lg-3">
          @includeIf('frontend.theme-phiten._modules.sidebar')
        </div>
      </div>
    </div>
  </main>
@endsection

@push('scripts')
  <script type="text/javascript">
    (function ($) {
      $(document).ready(function () {
        if ($(window).width() >= 768) {
          $('.equal_1,.equal_2,.equal_3').equal2(0)
          $('.equal_4,.equal_5,.equal_6').equal2(0)
          $('.equal_7,.equal_8,.equal_9').equal2(0)
          $('.equal_10,.equal_11,.equal_12').equal2(0)
        }

        if ($(window).width() > 575 && $(window).width() < 768) {
          $('.equal_1,.equal_2').equal2(0)
          $('.equal_3,.equal_4').equal2(0)
          $('.equal_5,.equal_6').equal2(0)
          $('.equal_7,.equal_8').equal2(0)
          $('.equal_9,.equal_10').equal2(0)
          $('.equal_11,.equal_12').equal2(0)
        }

      })

    })(jQuery)

    jQuery.fn.extend({
      equal2: function (padding) {
        var tempHeight = 0
        var here = this
        here.each(function () {
          tempHeight = tempHeight > this.offsetHeight ? tempHeight : this.offsetHeight    //kiem chieu cao lon nhat
        })
        here.css('height', tempHeight + padding + 'px')
      },
    })
  </script>
@endpush