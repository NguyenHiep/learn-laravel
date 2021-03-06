@if(!empty($products))
  <div class="prod-items section-items">
    @foreach($products as $product)
      <div class="prodlist-i">
      <a class="prodlist-i-img" href="{{ route('product.show', $product->slug) }}">
        @if(!empty($product->pictures))
          <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
        @else
          <img src="{{ asset('theme-ecommerce/img/354x236.png') }}" alt="{{ $product->name }}" title="{{ $product->name }}">
        @endif
      </a>
      <div class="prodlist-i-cont">
        <h3><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
        <div class="prodlist-i-txt">
          {!! $product->short_description !!}
        </div>
        
        <div class="prodlist-i-action">
          <p class="prodlist-i-qnt">
            <input value="1" type="text" type="text"  class="quantity_item" readonly>
            <a href="javascript:void(0)" class="prodlist-i-plus plus_quantity"><i class="fa fa-angle-up"></i></a>
            <a href="javascript:void(0)" class="prodlist-i-minus minus_quantity"><i class="fa fa-angle-down"></i></a>
          </p>
          <p class="prodlist-i-addwrap">
            <a href="javascript:void(0)" class="prodlist-i-add add_to_cart" data-id="{{ $product->id }}">Mua</a>
          </p>
          <span class="prodlist-i-price">
            <b>{{ format_price($product->price) }}</b>
            <del>{{ format_price($product->price) }}</del>
					</span>
        </div>
        <p class="prodlist-i-info">
          <a href="#" class="qview-btn prodlist-i-qview"  data-id="{{ $product->id }}"><i class="fa fa-search"></i> Xem nhanh</a>
          <a class="prodlist-i-compare compare_product" href="javascript:void(0)" data-id="{{ $product->id }}"><i class="fa fa-bar-chart"></i> So sánh</a>
        </p>
      </div>
      
      <div class="prodlist-i-props-wrap">
        <ul class="prodlist-i-props">
          <li><b>Mã sản phẩm</b> {{ $product->sku }}</li>
          <li><b>Tình trạng</b> {{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}</li>
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