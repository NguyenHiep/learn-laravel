@extends('frontend.theme-phiten.template')

@section('title', !(empty($product->meta_title)) ? $product->meta_title : $product->name)
@section('description', !(empty($product->meta_description)) ? $product->meta_description : $product->short_description)
@section('keywords', !(empty($product->meta_keywords)) ? $product->meta_keywords : $product->short_description)

@push('meta')
    <meta name="title" content="{{ $product->meta_title }}">
    <meta name="keywords" content="{{ $product->meta_keywords }}">
    <meta name="description" content="{{ $product->meta_description }}">
    <meta property="og:title" content="{{ $product->meta_title }}">
    <meta property="og:description" content="{{ $product->meta_description }}">
@endpush

@section('breadcrumb')
    <li><a href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
    <li class="active"><a href="javascript:void(0)">{{ $product->name }}</a></li>
@endsection

@section('content')
    <main id="main" class="page-product-detail" v-cloak>
        <div class="container">
            <div class="row grid-space-80">
                <div class="col-lg-6">
                    <div class="wrap-syn-owl ">
                        <div class="wrap-syn-1">
                            <div class="syn-slider-1 owl-carousel s-loop">
                               @if(!empty($product->listImages))
                                    @foreach($product->listImages as $image)
                                        <div class="item">
                                            <div class="tRes_80">
                                                <img src="{{ asset(UPLOAD_PRODUCT . $image) }}" alt="{{ $product->name }}" />
                                            </div>
                                        </div>
                                    @endforeach
                               @endif
                            </div>
                        </div>
                        <div class="wrap-syn-2">
                            <div class="syn-slider-2 owl-carousel" data-res="4,3,3,3" data-margin="30,30,20,20">
                                @if(!empty($product->listImages))
                                    @foreach($product->listImages as $image)
                                        <div class="item">
                                            <div class="tRes_80">
                                                <img src="{{ asset(UPLOAD_PRODUCT . $image) }}" alt="{{ $product->name }}" />
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="info-detail sec-b">
                        <h3>{{ $product->name }}</h3>
                        @if(!empty($settings->params) && !empty($settings->params['enable_product_comment']))
                        <div class="product-review total-rating">
                            <span class="product-rating">
                                <i class="icon icon-star-empty"></i>
                                <i class="icon icon-star-empty"></i>
                                <i class="icon icon-star-empty"></i>
                                <i class="icon icon-star-empty"></i>
                                <i class="icon icon-star-empty"></i>
                            </span> 0 Phản hồi khách hàng
                        </div>
                        @endif
                        <p class="price">
                            <span class="price_new">{{ format_price($product->sale_price) }}</span>
                            <span class="price_old">{{ format_price($product->price) }}</span>
                        </p>

                        <div class="row quan-color-size">
                            <div class="col-md-4">
                                <div class="title">Số lượng:</div>
                                <div class="quality" data-min="1" data-max="10">
                                    <a href="javascript:void(0)" class="minus" @click="decrementQuantity()"><i class="icon-minus"></i></a>
                                    <input type="number" v-model.number="quantity" @change="changeQuantity()"/>
                                    <a href="javascript:void(0)" class="plus" @click="incrementQuantity()"><i class="icon-plus"></i></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="title">Màu sắc:</div>
                                <div class="widget-color row">
                                    <select name="color" class="select">
                                        <option value="">Đỏ</option>
                                        <option value="">Xanh</option>
                                        <option value="">Vàng</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="title">Kích thước:</div>
                                <select name="size" class="select">
                                    <option value="">10cm</option>
                                    <option value="">20cm</option>
                                    <option value="">30cm</option>
                                </select>
                            </div>
                        </div>

                        <div class="desc">{!! $product->short_description !!}</div>

                        <div class="cart-like">
                            <button class="btn sm btn-buy-now" title="Mua ngay" @click="addToCart(itemCartBuyNow)">Mua ngay</button>
                            <a class="add-to-cart detail_add_to_cart_2" @click="addToCart(itemCart)"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-40">
                <div class="col-lg-12 col-md-12 margin-bottom-30">
                    <div class="cttab-product">
                        <div class="tab-inner active">
                            <div id="description" class="description tab-pane fade in active">
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty($settings->params) && !empty($settings->params['enable_product_comment']))
            <div class="row">
                <div class="col-lg-12">
                    <div class="review">
                        <div class="tab-inner active">
                            <div id="reviews" class="tab-reviews reviews tab-pane fade in  ">
                                <ul class="user-review list-commnets  mb-20">
                                    <li class="item">
                                        <div class="name">
                                            <div class="text">
                                                <div class="date">
                                                    <span class="time" data-toggle="tooltip" title="May 10, 2020">
                                                    12 phút trước</span>
                                                </div>
                                                <div class="title">Hiep Nguyen</div>
                                                <span class="product-rating">
                                                    <i class="icon icon-star-full rated"></i>
                                                    <i class="icon icon-star-full rated"></i>
                                                    <i class="icon icon-star-full rated"></i>
                                                    <i class="icon icon-star-empty"></i>
                                                    <i class="icon icon-star-empty"></i>
                                                </span>

                                            </div>
                                        </div>
                                        <div class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            varius tortor nibh,
                                            sit amet tempor nibh finibus et. Aenean eu enim justo. Vestibulum aliquam
                                            hendrerit molestie. Mauris
                                            malesuada nisi sit amet augue accumsan tincidunt. Maecenas tincidunt, velit ac
                                            porttitor pulvinar,
                                        </div>
                                    </li>
                                </ul>

                                <div>
                                    <button type="submit" class="btn btn1 btn-review-popup">Thêm đánh giá</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </main>
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
                                    <a href="{{ route('product.show', ['slug' => $relatedProduct->slug]) }}" class="gitem cart"><i class="icon-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="divtext">
                            <a href="{{ route('product.show', ['slug' => $relatedProduct->slug]) }}" class="title equal_{{ $loop->iteration + 1 }}">{{ $relatedProduct->name }}</a>
                            <p class="price"> {{ format_price($relatedProduct->sale_price) }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif
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
                                        <a href="{{ route('product.show', ['slug' => $viewedProduct->slug]) }}" class="gitem cart"><i class="icon-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="divtext">
                                <a href="{{ route('product.show', ['slug' => $viewedProduct->slug]) }}" class="title equal_{{ $loop->iteration + 1 }}">{{ $viewedProduct->name }}</a>
                                <p class="price"> {{ format_price($viewedProduct->sale_price) }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif
    @if(!empty($settings->params) && !empty($settings->params['enable_product_comment']))
        @includeIf('frontend.theme-phiten._modules.review-product')
    @endif
@endsection
@push('scripts')
    <script src='{{ asset('theme-phiten/assets/js/owl.carousel.min.js') }}'></script>
    <script src='{{ asset('theme-phiten/assets/js/imagesloaded.pkgd.min.js') }}'></script>
    <script src='{{ asset('theme-phiten/assets/js/script_owl.js') }}'></script>
    @if(!empty($settings->params) && !empty($settings->params['enable_product_comment']))
    <script>
      jQuery(document).ready(function () {
        jQuery('.btn-review-popup').on('click', function (e) {
          e.preventDefault()
          jQuery('#myReview').modal('show')
        })
      })
    </script>
    @endif
    <script>
      const MAX_NUMBER = 10
      const MIN_NUMBER = 1

      new Vue({
        el: '#wrapper',
        data: {
          quantity: 1,
          itemCart: {
            quantity: 1,
            product_id: '{{ $product->id }}'
          },
          itemCartBuyNow: {
            quantity: 1,
            product_id: '{{ $product->id }}',
            redirectUrl: '{{ route('checkout.cart.index') }}'
          }
        },
        methods: {
          changeQuantity () {
            this.quantity = (this.quantity > MAX_NUMBER) ? MAX_NUMBER : ((this.quantity < MIN_NUMBER) ? MIN_NUMBER : this.quantity)
            this.itemCartBuyNow.quantity = this.quantity
          },
          decrementQuantity () {
            this.quantity = (this.quantity < 2) ? MIN_NUMBER : this.quantity - 1
            this.itemCartBuyNow.quantity = this.quantity
          },
          incrementQuantity () {
            this.quantity = (this.quantity > MAX_NUMBER) ? MAX_NUMBER : this.quantity + 1
            this.itemCartBuyNow.quantity = this.quantity
          }
        }
      })
    </script>
@endpush