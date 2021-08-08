@extends('frontend.theme-phiten.template')

@section('title', 'Chuyên mục '. strtolower($category->name))

@push('meta')
  <meta name="title" content="Chuyên mục {{ strtolower($category->name) }} - shop chuyên cung cấp sỉ và lẻ quần áo">
  <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
  <meta name="description" content="Chuyên mục {{ strtolower($category->name) }} - shop chuyên cung cấp sỉ và lẻ quần áo">
  <meta property="og:title" content="Chuyên mục {{ strtolower($category->name) }} - shop chuyên cung cấp sỉ và lẻ quần áo">
  <meta property="og:description" content="Chuyên mục {{ strtolower($category->name) }} - shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('content')
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
        <div class="col-lg-3">
          @includeIf('frontend.theme-phiten._modules.sidebar')
        </div>
      </div>
    </div>
  </main>
@endsection
