@if(!empty($settings->params['enable_home_product_trending']) || !empty($settings->params['enable_home_product_related']))
<section class=" sec-tb sec-3 lists-1 lists-1-hover">
    <div class="container">
        @if(!empty($settings->params['enable_home_product_trending']) && $products_trending->isNotEmpty())
            <div class="entry-head">
                <h2 class="st" data-title="Sản phẩm thịnh hành">
                    <span>Sản phẩm thịnh hành</span>
                </h2>
            </div>
            <div class="sec-b">
                <div class="owl-carousel s-nav nav-1" data-res="4,3,2,2" data-margin="0,0,0,0">
                    @foreach($products_trending as $product)
                        <div class="item">
                            <div class="img">
                                <img class="owl-lazy" data-src="{{ Storage::url($product->pictures) }}"  alt="{{ $product->name }}" />
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
                                <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="title">{{ $product->name }}</a>
                                <p class="price"> {{ format_price($product->actual_price) }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if(!empty($settings->params['enable_home_product_related']) && $products_viewed->isNotEmpty())
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget">
                        <h3 class="widget-title">Sản phẩm đã xem</h3>
                        <div class="owl-carousel s-nav nav-3" data-res="4,3,2,2" data-margin="20,20,20,0">
                            @foreach($products_viewed as $product)
                                <div class="item">
                                    <div class="img">
                                        <img class="owl-lazy" data-src="{{ Storage::url($product->pictures) }}"  alt="{{ $product->name }}" />
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
                                        <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="title">{{ $product->name }}</a>
                                        <p class="price"> {{ format_price($product->actual_price) }} </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endif
