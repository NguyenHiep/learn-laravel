@if($categories->isNotEmpty())
    @foreach($categories as $category)
    @if(($loop->iteration == 1 && !empty($settings->params['enable_home_category_one']))
       || ($loop->iteration == 2 && !empty($settings->params['enable_home_category_two']))
       || ($loop->iteration == 3 && !empty($settings->params['enable_home_category_three']))
       || ($loop->iteration == 4 && !empty($settings->params['enable_home_category_four']))
    )
    <section class=" sec-product sec-product-{{ $loop->iteration }}">
        <div class="row grid-space-0 {{ $loop->iteration % 2 == 0 ? 'end' : '' }}">
            <div class="col-md-4">
                <div class="item_intro">
                    <img class="img lazy-hidden" data-lazy-type="image" src="{{ asset(UPLOAD_CATEGORY . $category->image) }}" data-lazy-src="{{ asset(UPLOAD_CATEGORY . $category->image) }}" alt="{{ $category->name }}" />
                    <div class="divtext">
                        <h2 class="title">{{ $category->name }}</h2>
                        <div class="desc">{!! $category->description !!}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="widget lists-1 lists-1-hover">
                    <h3 class="widget-title">Gợi ý cho bạn</h3>
                    @if(!empty($category->products))
                        <div class="owl-carousel s-auto_ s-nav nav-3" data-res="3,2,2,2,2" data-margin="30,20,20,0">
                            @foreach($category->products as $product)
                                <div class="item">
                                    <div class="img">
                                        <img class="owl-lazy" data-src="{{ asset(UPLOAD_PRODUCT . $product->pictures) }}"  alt="{{ $product->name }}" />
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
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif
    @endforeach
@endif
