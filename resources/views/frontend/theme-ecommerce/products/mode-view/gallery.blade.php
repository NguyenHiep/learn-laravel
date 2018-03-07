@if(!empty($products))
  <div class="prod-items section-items">
    @foreach($products as $product)
      <div class="prod-i">
        <div class="prod-i-top">
          <a href="{{ route('product.show', $product->slug) }}" class="prod-i-img">
            @if(!empty($product->pictures))
              <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
            @else
              <img src="http://placehold.it/250x350" alt="{{ $product->name }}" title="{{ $product->name }}">
            @endif
          </a>
          <p class="prod-i-info">
            <a href="javascript:void(0)" class="prod-i-favorites" data-id="{{ $product->id }}"><span>Yêu thích</span><i class="fa fa-heart"></i></a>
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
@endif