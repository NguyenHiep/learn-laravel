@if(!empty($products))
  <div class="prod-items section-items">
    @foreach($products as $product)
      <div class="prodlist-i">
      <a class="prodlist-i-img" href="{{ route('product.show', $product->slug) }}">
        @if(!empty($product->pictures))
          <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
        @else
          <img src="http://placehold.it/300x311" alt="{{ $product->name }}" title="{{ $product->name }}">
        @endif
      </a>
      <div class="prodlist-i-cont">
        <h3><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
        <div class="prodlist-i-txt">
          {!! $product->short_description !!}
        </div>
        
        <div class="prodlist-i-action">
          <p class="prodlist-i-qnt">
            <input value="1" type="text">
            <a href="#" class="prodlist-i-plus"><i class="fa fa-angle-up"></i></a>
            <a href="#" class="prodlist-i-minus"><i class="fa fa-angle-down"></i></a>
          </p>
          <p class="prodlist-i-addwrap">
            <a href="javascript:void(0)" class="prodlist-i-add" data-id="{{ $product->id }}">Mua</a>
          </p>
          <span class="prodlist-i-price">
            <b>{{ format_price($product->price) }}</b>
            <del>{{ format_price($product->price) }}</del>
					</span>
        </div>
        <p class="prodlist-i-info">
          <a href="#" class="prodlist-i-favorites"><i class="fa fa-heart"></i> Yêu thích</a>
          <a href="#" class="qview-btn prodlist-i-qview"><i class="fa fa-search"></i> Xem nhanh</a>
          <a class="prodlist-i-compare" href="javascript:void(0)" data-id="{{ $product->id }}"><i class="fa fa-bar-chart"></i> So sánh</a>
        </p>
      </div>
      
      <div class="prodlist-i-props-wrap">
        <ul class="prodlist-i-props">
          <li><b>Mã sản phẩm</b> {{ $product->sku }}</li>
          <li><b>Sản xuất</b> Việt Nam</li>
          <li><b>Tình trạng</b> Còn hàng</li>
        </ul>
      </div>
      <div class="prod-sticker">
        <p class="prod-sticker-1">Mới</p>
        <br><p class="prod-sticker-2">Hot</p>
      </div>
    </div>
    @endforeach
  </div>
@endif