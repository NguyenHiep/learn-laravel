@if(!empty($product))
  <div class="prod-wrap">
    <a href="{{ route('product.show', $product->slug) }}">
      <h1 class="main-ttl">
        <span>{{ $product->name }}</span>
      </h1>
    </a>
    <div class="prod-slider-wrap">
      <div class="prod-slider">
        <ul class="prod-slider-car">
          <li>
            @if(!empty($product->pictures))
              <a data-fancybox-group="product" class="fancy-img" href="{{ Storage::url($product->pictures)}}">
                <img src="{{ Storage::url($product->pictures) }}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
              </a>
            @else
              <a data-fancybox-group="product" class="fancy-img" href="{{ asset('theme-ecommerce/img/354x236.png') }}">
                <img src="{{ asset('theme-ecommerce/img/354x236.png') }} alt="{{ $product->name }}" title="{{ $product->name }}" />
              </a>
            @endif
          </li>
          @if(!empty($product->galary_img))
            @foreach($product->galary_img as $item)
              <li>
                <a data-fancybox-group="product" class="fancy-img" href="{{ Storage::url($item) }}">
                  <img src="{{Storage::url($item)}}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-responsive" />
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
                <img src="{{ Storage::url($product->pictures) }}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
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
                  <img src="{{asset( Storage::url($item) )}}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-responsive" />
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
  </div>
@endif
