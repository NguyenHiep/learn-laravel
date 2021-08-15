@extends('frontend.theme-phiten.template')

@section('title', !(empty($product->meta_title)) ? $product->meta_title : $product->name)

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
                                 @for($i = 1; $i <= 5; $i++)
                                    <i class="icon {{ $i > ceil($listComment->avg('rate')) ? 'icon-star-empty' : 'icon-star-full rated' }}"></i>
                                 @endfor
                            </span> {{ $listComment->total() }} Phản hồi khách hàng
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
{{--                            <div class="col-md-4">--}}
{{--                                <div class="title">Màu sắc:</div>--}}
{{--                                <div class="widget-color row">--}}
{{--                                    <select name="color" class="select">--}}
{{--                                        <option value="">Đỏ</option>--}}
{{--                                        <option value="">Xanh</option>--}}
{{--                                        <option value="">Vàng</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="title">Kích thước:</div>--}}
{{--                                <select name="size" class="select">--}}
{{--                                    <option value="">10cm</option>--}}
{{--                                    <option value="">20cm</option>--}}
{{--                                    <option value="">30cm</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
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
                            <div id="reviews" class="tab-reviews reviews tab-pane fade in">
                                @if($listComment->total() > 0)
                                    <ul class="user-review list-commnets mb-20">
                                        @foreach($listComment as $comment)
                                            <li class="item">
                                                <div class="name">
                                                    <div class="text">
                                                        <div class="date">
                                                            <span class="time" data-toggle="tooltip" title="{{ format_date($comment->created_at,'%d/%m/%Y') }}">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                                        </div>
                                                        <div class="title">{{ $comment->name }}</div>
                                                        <span class="product-rating">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <i class="icon {{ $i > $comment->rate ? 'icon-star-empty' : 'icon-star-full rated' }}"></i>
                                                            @endfor
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="desc">{{ $comment->content }}</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div>
                                    @if($listComment->lastPage() > 1)
                                        {{ $listComment->appends(request()->query())->links('vendor.pagination.bootstrap-4')  }}
                                    @endif
                                </div>
                                <div class="clearfix">
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
    @includeIf('frontend.theme-phiten.components.product.related', ['settings' => $settings])
    @includeIf('frontend.theme-phiten.components.product.recent', ['settings' => $settings])
    @includeIf('frontend.theme-phiten._modules.review-product', ['settings' => $settings])
@endsection
@push('scripts')
    <script src='{{ asset('assets/js/owl.carousel.min.js') }}'></script>
    <script src='{{ asset('assets/js/imagesloaded.pkgd.min.js') }}'></script>
    <script src='{{ asset('assets/js/script_owl.js') }}'></script>
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
        created () {
          this.getListItemCart()
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
          },
          refreshCaptchaComment () {
            let self = this
            self.loading = true
            axios.get('/refresh/captcha').then(response => {
              let responseData = response.data
              self.loading = false
              if (!_.isEmpty(responseData.data) && !_.isEmpty(responseData.data.captcha)) {
                jQuery('#refresh-captcha-comment').html(responseData.data.captcha)
              }
            }).catch(error => {
              console.log(error)
              self.errored = true
            }).finally(() => self.loading = false)
          }
        }
      })
    </script>
@endpush
