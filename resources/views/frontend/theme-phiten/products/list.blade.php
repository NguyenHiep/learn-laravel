@extends('frontend.theme-phiten.template')

@section('title', 'Sản phẩm - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Sản phẩm - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('breadcrumb')
    <li class="active"><a href="javascript:void(0)">Sản phẩm</a></li>
@endsection

@section('content')
    <main id="main">
        <div class="container">
            <div class="row end">
                <div class="col-lg-12">
                    <div class="topresults clearfix">
                        <div class="results"><span class="cl1 b">{{ $products->total() }}</span> Sản phẩm được tìm thấy</div>
                        <div class="search-result-right pull-right orderby">
                            <div class="form-group">
                                <select class="custom-select-black select" onchange="location = this.value">
                                    <option value="{{ route('product.list', ['sort' => 'topRated']) }}" {{ $sort === 'topRated' ? 'selected="selected"' : '' }}>Xếp hạng hàng đầu</option>
                                    <option value="{{ route('product.list', ['sort' => 'latest']) }}" {{ $sort === 'latest' ? 'selected="selected"' : '' }}>Mới nhất</option>
                                    <option value="{{ route('product.list', ['sort' => 'priceLowToHigh']) }}" {{ $sort === 'priceLowToHigh'? 'selected="selected"' : '' }}>Giá: từ thấp đến cao</option>
                                    <option value="{{ route('product.list', ['sort' => 'priceHighToLow']) }}" {{ $sort === 'priceHighToLow' ? 'selected="selected"' : '' }}>Giá: từ cao đến thấp</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mainproduct lists-1 lists-1-hover">
                        <div class="row grid-space-0">
                            @if($products->total() > 0)
                                @foreach($products as $product)
                                    <div class="col-6 col-sm-6 col-md-3">
                                        <div class="item">
                                            <div class="img">
                                                <img class="lazy-hidden" data-lazy-type="image" data-lazy-src="{{ asset(UPLOAD_PRODUCT . $product->pictures) }}"  alt="{{ $product->name }}"  />
                                                <div class="groupbtn">
                                                    <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="btn btn2 sm"> View Detail</a>
                                                    <div class="group">
                                                        <span class="gitem like"><i class="icon-heart"></i></span>
                                                        <a href="javascript:void(0)"
                                                           class="gitem cart"
                                                           @click="addToCart({quantity: 1, product_id: {{ $product->id }} })"
                                                        >
                                                            <i class="icon-cart"></i>
                                                        </a>
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