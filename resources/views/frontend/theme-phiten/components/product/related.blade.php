@if(!empty($settings->params) && !empty($settings->params['enable_product_related']))
    <section class="sec-tb related-products lists-1">
        <div class="container">
            <div class="entry-head">
                <h2 class="st" data-title="Sản Phẩm Liên Quan">
                    <span>Sản Phẩm Liên Quan</span>
                </h2>
            </div>
            @if($products_related->isNotEmpty())
                <div class="owl-carousel s-auto s-nav nav-1" data-res="5,4,3,1" data-margin="10,10,10,10">
                    @foreach($products_related as $relatedProduct)
                        <div class="item">
                            <div class="img">
                                <img class="owl-lazy" data-src="{{ asset(UPLOAD_PRODUCT . $relatedProduct->pictures) }}"  alt="{{ $relatedProduct->name }}" />
                                <div class="groupbtn">
                                    <a href="{{ route('product.show', ['slug' => $relatedProduct->slug]) }}" class="btn btn2 sm"> View Detail</a>
                                    <div class="group">
                                        <span class="gitem like"><i class="icon-heart"></i></span>
                                        <a href="javascript:void(0)"
                                           class="gitem cart"
                                           @click="addToCart({quantity: 1, product_id: {{ $relatedProduct->id }} })"
                                        >
                                            <i class="icon-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="divtext">
                                <a href="{{ route('product.show', ['slug' => $relatedProduct->slug]) }}" class="title equal_{{ $loop->iteration + 1 }}">{{ $relatedProduct->name }}</a>
                                <p class="price"> {{ format_price($relatedProduct->actual_price) }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endif
