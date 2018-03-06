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
            <input value="1" type="text">
            <a href="#" class="prodtb-i-plus"><i class="fa fa-angle-up"></i></a>
            <a href="#" class="prodtb-i-minus"><i class="fa fa-angle-down"></i></a>
          </p>
        </div>
        <p class="prodtb-i-action">
          <a href="javascript:void(0)" class="prodtb-i-favorites"><span>Yêu thích</span><i class="fa fa-heart"></i></a>
          <a class="prodtb-i-compare" href="javascript:void(0)"><span>So sánh</span><i class="fa fa-bar-chart"></i></a>
          <a href="javascript:void(0)" class="qview-btn prodtb-i-qview"><span>Xem nhanh</span><i class="fa fa-search"></i></a>
          <a href="javascript:void(0)" class="prodtb-i-buy"><span>Mua</span><i class="fa fa-shopping-basket"></i></a>
        </p>
      </div>
      <div class="prodlist-i">
        <a class="list-img-carousel prodlist-i-img" href="{{ route('product.show', $product->slug) }}">
          @if(!empty($product->pictures))
            <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
          @else
            <img src="http://placehold.it/250x350" alt="{{ $product->name }}" title="{{ $product->name }}">
          @endif
        </a>
        <div class="prodlist-i-cont">
          <div class="prodlist-i-txt">
            {!! $product->short_description !!}
          </div>
        </div>
        
        <ul class="prodlist-i-props2">
          <li><span class="prodlist-i-propttl"><span>Mã sản phẩm</span></span> <span class="prodlist-i-propval">{{ $product->sku }}</span></li>
          <li><span class="prodlist-i-propttl"><span>Xuất xứ</span></span> <span class="prodlist-i-propval">Việt Nam</span></li>
          <li><span class="prodlist-i-propttl"><span>Tình trạng</span></span> <span class="prodlist-i-propval">còn hàng</span></li>
        </ul>
      </div>
    </div>
    @endforeach
  </div>
@endif
