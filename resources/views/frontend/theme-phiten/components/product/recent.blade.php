@if(!empty($settings->params) && !empty($settings->params['enable_product_viewed']))
    <section class="style-widget-1 sec-tb reviewed-products lists-1">
        <div class="container">
            <div class="widget">
                <h3 class="widget-title">Sản phẩm đã xem</h3>
                @if($products_viewed->isNotEmpty())
                    <div class="owl-carousel s-auto s-nav nav-3" data-res="5,4,3,1" data-margin="10,10,10,10">
                        @foreach($products_viewed as $viewedProduct)
                            <div class="item">
                                <div class="img">
                                    <img class="owl-lazy" data-src="{{ asset(UPLOAD_PRODUCT . $viewedProduct->pictures) }}"  alt="{{ $viewedProduct->name }}" />
                                    <div class="groupbtn">
                                        <a href="{{ route('product.show', ['slug' => $viewedProduct->slug]) }}" class="btn btn2 sm"> View Detail</a>
                                        <div class="group">
                                            <span class="gitem like"><i class="icon-heart"></i></span>
                                            <a href="javascript:void(0)"
                                               class="gitem cart"
                                               @click="addToCart({quantity: 1, product_id: {{ $viewedProduct->id }} })"
                                            >
                                                <i class="icon-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="divtext">
                                    <a href="{{ route('product.show', ['slug' => $viewedProduct->slug]) }}" class="title equal_{{ $loop->iteration + 1 }}">{{ $viewedProduct->name }}</a>
                                    <p class="price"> {{ format_price($viewedProduct->actual_price) }} </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
