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
    <li class="active">{{ $product->name }}</li>
@endsection

@section('content')
    <main id="main" class="page-product-detail" v-cloak>
        <div class="container">
            <div class="row grid-space-80">
                <div class="col-lg-6">
                    @includeIf('frontend.theme-phiten.components.product.pdp-images', ['product' => $product])
                </div>
                <div class="col-lg-6">
                    <div class="info-detail sec-b">
                        <h3>{{ $product->name }}</h3>
                        @includeIf('frontend.theme-phiten.components.reviews.inline-rating', [
                            'settings'    => $settings,
                            'listComment' => $listComment
                        ])
                        @includeIf('frontend.theme-phiten.components.product.price', ['product' => $product])
                        <div class="row quan-color-size">
                            <div class="col-md-4">
                                <div class="title">Số lượng:</div>
                                <div class="quality" data-min="1" data-max="10">
                                    <a href="javascript:void(0)" class="minus" @click="decrementQuantity()"><i class="icon-minus"></i></a>
                                    <input type="number" v-model.number="quantity" @change="changeQuantity()"/>
                                    <a href="javascript:void(0)" class="plus" @click="incrementQuantity()"><i class="icon-plus"></i></a>
                                </div>
                            </div>
{{--                            @includeIf('frontend.theme-phiten.components.product.pdp-attributes', ['product' => $product])--}}
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
            @includeIf('frontend.theme-phiten.components.reviews.list-reviews', [
               'settings'    => $settings,
               'listComment' => $listComment
           ])
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
      const MAX_NUMBER = 10;
      const MIN_NUMBER = 1;

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
          this.getListItemCart();
        },
        methods: {
          changeQuantity () {
            this.quantity = (this.quantity > MAX_NUMBER) ? MAX_NUMBER : ((this.quantity < MIN_NUMBER) ? MIN_NUMBER : this.quantity);
            this.itemCartBuyNow.quantity = this.quantity;
          },
          decrementQuantity () {
            this.quantity = (this.quantity < 2) ? MIN_NUMBER : this.quantity - 1;
            this.itemCartBuyNow.quantity = this.quantity;
          },
          incrementQuantity () {
            this.quantity = (this.quantity > MAX_NUMBER) ? MAX_NUMBER : this.quantity + 1;
            this.itemCartBuyNow.quantity = this.quantity;
          },
          refreshCaptchaComment () {
            let self = this;
            self.loading = true;
            axios.get(window.app.Urls.REFRESH_RECAPTCHA).then(response => {
              let responseData = response.data;
              self.loading = false;
              if (!_.isEmpty(responseData.data) && !_.isEmpty(responseData.data.captcha)) {
                jQuery('#refresh-captcha-comment').html(responseData.data.captcha);
              }
            }).catch(error => {
              console.log(error);
              self.errored = true;
            }).finally(() => self.loading = false);
          }
        }
      })
    </script>
@endpush
