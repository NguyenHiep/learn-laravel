<div class="fr-pop-wrap">
  <h3 class="component-ttl"><span>{{ $datas['category_name'] }}</span></h3>
</div>
@if(count($datas['products']) > 0)
  <div class="section-cont section-full">
    <div class="prod-items section-items">
      @foreach($datas['products'] as $product)
        <div class="prod-i">
          <div class="prod-i-top">
            <a href="{{ route('product.show', $product->slug) }}" class="prod-i-img"><!-- NO SPACE --><img src="http://placehold.it/378x300" alt="Sunt temporibus velit"><!-- NO SPACE --></a>
            <p class="prod-i-info">
              <a href="#" class="prod-i-favorites"><span>Yêu thích</span><i class="fa fa-heart"></i></a>
              <a href="#" class="qview-btn prod-i-qview"><span>Xem nhanh</span><i class="fa fa-search"></i></a>
              <a class="prod-i-compare" href="#"><span>So sánh</span><i class="fa fa-bar-chart"></i></a>
            </p>
              <a href="#" class="prod-i-buy">Thêm vào giỏ hàng</a>
            <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
            
            <div class="prod-i-properties">
              {!! $product->short_description !!}
            </div>
            {{-- <div class="prod-sticker">
               <p class="prod-sticker-1">Mới</p>
               <br><p class="prod-sticker-2">Hot</p>
             </div>--}}
          </div>
          <h3>
            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
          </h3>
          <p class="prod-i-price">
            <b>{{ format_price($product->price) }}</b>
          </p>
        </div>
      @endforeach
    </div>
  </div>
@endif