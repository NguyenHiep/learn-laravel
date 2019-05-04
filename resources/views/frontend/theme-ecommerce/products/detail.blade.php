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
        <li>
          <span>{{ $product->name }}</span>
        </li>
      </ul>
      <h1 class="main-ttl"><span>{{ $product->name }}</span></h1>
      <div class="prod-wrap">
        <div class="prod-slider-wrap">
          <div class="prod-slider">
            <ul class="prod-slider-car">
              <li>
              @if(!empty($product->pictures))
                  <a data-fancybox-group="product" class="fancy-img" href="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}">
                <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
                  </a>
              @else
                <a data-fancybox-group="product" class="fancy-img" href="{{ asset('theme-ecommerce/img/354x236.png') }}">
                  <img src="{{ asset('theme-ecommerce/img/354x236.png') }}" alt="{{ $product->name }}" title="{{ $product->name }}" />
                </a>
              @endif
              </li>
              @if(!empty($product->galary_img))
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
                    <img src="{{ asset('theme-ecommerce/img/354x236.png') }}" alt="{{ $product->name }}" title="{{ $product->name }}" />
                  </a>
                @endif
              </li>
              @if(!empty($product->galary_img))
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
        <div class="prod-cont">
          <ul class="prod-cont-txt">
            <li>
              <b>Mã sản phẩm</b> {{ $product->sku }}
            </li>
            <li>
              <b>Trạng thái</b> {{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}
            </li>
          </ul>
          <div class="prod-cont-txt">{!!  $product->short_description !!}</div>
          <p class="prod-actions">
            <a href="javascript:void(0)" class="prod-compare compare_product"  data-id="{{ $product->id }}"><i class="fa fa-bar-chart"></i> So sánh</a>
          </p>
          <div class="prod-info">
            <p class="prod-price">
              <b class="item_current_price">{{ format_price($product->price) }}</b>
            </p>
            <p class="prod-qnt">
              <input value="1" type="text" class="quantity_item" readonly>
              <a href="javascript:void(0)" class="prod-plus plus_quantity"><i class="fa fa-angle-up"></i></a>
              <a href="javascript:void(0)" class="prod-minus minus_quantity"><i class="fa fa-angle-down"></i></a>
            </p>
            <p class="prod-addwrap">
              <a href="javascript:void(0)" class="prod-add add_to_cart" rel="nofollow" data-id="{{ $product->id }}">Mua</a>
            </p>
          </div>
        </div>
        <!-- Product Tabs -->
        <div class="prod-tabs-wrap">
          <ul class="prod-tabs">
            <li><a data-prodtab-num="1" class="active" href="#" data-prodtab="#prod-tab-1">Mô tả</a></li>
          </ul>
          <div class="prod-tab-cont">
            <p data-prodtab-num="1" class="prod-tab-mob active" data-prodtab="#prod-tab-1">Mô tả</p>
            <div class="prod-tab stylization" id="prod-tab-1"> {!! $product->description !!}</div>
          </div>
        </div>
      
      </div>
      <div class="prod-related">
        <h2><span>Sản phẩm tương tự</span></h2>
        @if(!empty($product_related))
          <div class="prod-related-car" id="prod-related-car">
            <ul class="slides">
              <li class="prod-rel-wrap">
                @foreach($product_related as $product)
                  <div class="prod-rel">
                    <a href="{{ route('product.show', $product->slug) }}" title="{{ $product->name }}" class="prod-rel-img">
                      @if(!empty($product->pictures))
                        <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}"  title="{{ $product->name }}"/>
                      @else
                        <img src="{{ asset('theme-ecommerce/img/354x236.png') }}" alt="{{ $product->name }}" title="{{ $product->name }}" />
                      @endif
                    </a>
                    <div class="prod-rel-cont">
                      <h3><a href="{{ route('product.show', $product->slug) }}" title="{{ $product->name }}">{{ $product->name }}</a></h3>
                      <p class="prod-rel-price">
                        <b>{{ format_price($product->price) }}</b>
                      </p>
                      <div class="prod-rel-actions">
                        <a title="So sánh" href="javascript:void(0)" class="prod-rel-compare compare_product" data-id="{{ $product->id }}"><i class="fa fa-bar-chart"></i></a>
                        <p class="prod-i-addwrap">
                          <a title="Mua" href="javascript:void(0)" class="prod-i-add add_to_cart" data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a>
                        </p>
                      </div>
                    </div>
                </div>
                @endforeach
              </li>
            </ul>
          </div>
        @endif
      </div>
    </section>
  </main>
@endsection