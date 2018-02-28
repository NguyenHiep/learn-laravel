@if(count($datas['tabs']))
<div class="fr-pop-wrap">
  <h3 class="component-ttl"><span>{{ $datas['category_name'] }}</span></h3>
    <ul class="fr-pop-tabs sections-show">
      @foreach($datas['tabs'] as  $tab)
        <li><a data-frpoptab-num="{{ $loop->index }}" data-frpoptab="#frpoptab-tab-{{ $loop->index }}" href="#" @if($loop->first)class="active" @endif >{{ $tab['title'] }}</a></li>
      @endforeach
    </ul>
    <div class="fr-pop-tab-cont">
      @foreach($datas['tabs'] as  $key => $tab)
        <p data-frpoptab-num="{{ $loop->index }}" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-{{ $loop->index }}">Sản phẩm bán chạy nhất</p>
        <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-{{ $loop->index }}">
          <ul class="slides">
            @foreach($tab['items'] as $product)
              <li class="prod-i">
                <div class="prod-i-top">
                  <a href="{{ route('product.show', $product->slug) }}" class="prod-i-img">
                    @if(!empty($product->pictures))
                      <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
                    @else
                      <img src="http://placehold.it/250x350" alt="{{ $product->name }}" title="{{ $product->name }}">
                    @endif
                  </a>
                  <p class="prod-i-info">
                    <a href="javascript:void(0) " class="prod-i-favorites wishlist-product" data-id="{{ $product->id }}"><span>Yêu thích</span><i class="fa fa-heart"></i></a>
                    <a href="javascript:void(0)" class="qview-btn prod-i-qview" data-id="{{ $product->id }}"><span>Xem nhanh</span><i class="fa fa-search"></i></a>
                    <a class="prod-i-compare" href="javascript:void(0)" data-id="{{ $product->id }}"><span>So sánh</span><i class="fa fa-bar-chart"></i></a>
                  </p>
                  <p class="prod-i-addwrap">
                    <a href="{{ route('product.show', $product->slug) }}" class="prod-i-add">Xem chi tiết</a>
                  </p>
                </div>
                <h3>
                  <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                </h3>
                <p class="prod-i-price">
                  <b>{{ format_price($product->price)  }}</b>
                </p>
                {{--<div class="prod-i-skuwrapcolor">
                  <ul class="prod-i-skucolor">
                    <li class="bx_active"><img src="img/color/red.jpg" alt="Red"></li>
                    <li><img src="img/color/blue.jpg" alt="Blue"></li>
                  </ul>
                </div>
                <div class="prod-sticker">
                  <p class="prod-sticker-1">Mới</p>
                  <br><p class="prod-sticker-2">Hot</p>
                </div>--}}
              </li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </div><!-- .fr-pop-tab-cont -->
 
</div><!-- .fr-pop-wrap -->
@endif