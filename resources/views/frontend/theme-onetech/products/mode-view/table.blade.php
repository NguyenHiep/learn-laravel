@if(!empty($products))
  <div class="prod-items section-items prod-tb">
    @foreach($products as $product)
      <div class="prodtb-i">
      <div class="prodtb-i-top">
        <button class="prodtb-i-toggle" type="button"></button>
        <h3 class="prodtb-i-ttl"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
        <div class="prodtb-i-info">
          <span class="prodtb-i-price">
            <b>{{ format_price($product->price) }}</b>
            <del>{{ format_price($product->price) }}</del>
          </span>
          <p class="prodtb-i-qnt">
            <input value="1" type="text" class="quantity_item" readonly>
            <a href="javascript:void(0)" class="prodtb-i-plus plus_quantity"><i class="fa fa-angle-up"></i></a>
            <a href="javascript:void(0)" class="prodtb-i-minus minus_quantity"><i class="fa fa-angle-down"></i></a>
          </p>
        </div>
        <p class="prodtb-i-action">
          <a class="prodtb-i-compare compare_product" href="javascript:void(0)" data-id="{{ $product->id }}"><span>So sánh</span><i class="fa fa-bar-chart"></i></a>
          <a href="javascript:void(0)" class="qview-btn prodtb-i-qview" data-id="{{ $product->id }}"><span>Xem nhanh</span><i class="fa fa-search"></i></a>
          <a href="javascript:void(0)" class="prodtb-i-buy add_to_cart" data-id="{{ $product->id }}"><span>Mua</span><i class="fa fa-shopping-basket"></i></a>
        </p>
      </div>
      <div class="prodlist-i">
        <a class="list-img-carousel prodlist-i-img" href="{{ route('product.show', $product->slug) }}">
          @if(!empty($product->pictures))
            <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
          @else
            <img src="{{ asset('theme-ecommerce/img/354x236.png') }} alt="{{ $product->name }}" title="{{ $product->name }}">
          @endif
        </a>
        <div class="prodlist-i-cont">
          <div class="prodlist-i-txt">
            {!! $product->short_description !!}
          </div>
        </div>
        
        <ul class="prodlist-i-props2">
          <li><span class="prodlist-i-propttl"><span>Mã sản phẩm</span></span> <span class="prodlist-i-propval">{{ $product->sku }}</span></li>
          <li><span class="prodlist-i-propttl"><span>Tình trạng</span></span> <span class="prodlist-i-propval">{{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}</span></li>
        </ul>
      </div>
    </div>
    @endforeach
  </div>
@endif
