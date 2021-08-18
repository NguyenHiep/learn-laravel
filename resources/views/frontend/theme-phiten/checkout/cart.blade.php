@extends('frontend.theme-phiten.template')

@section('title', 'Giỏ hàng của bạn - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Giỏ hàng của bạn - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Giỏ hàng của bạn - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('content')
    <div class="page-payment">
        <div class="entry-heading">
            <div class="container">
                <h1>Giỏ hàng</h1>
            </div>
        </div>
        <div class="entry-heading2" v-if="listItemCart.length > 0">
            <div class="container">
                <h3><img src="{{ asset('assets/images/svg/list-cart.svg') }}" alt="list-cart"/>Giỏ hàng
                </h3>
            </div>
        </div>
        <main id="main">
            <div class="container">
                <template v-if="listItemCart.length === 0">
                    <div class="content-wrapper clearfix cart-page">
                        <div class="successful">
                            <h2>Giỏ hàng của bạn đang trống!</h2>
                            <p><img src="{{ asset('assets/images/svg/icon_cart_empty_grey.svg') }}" alt="not empty"></p>
                            <p>Quay lại cửa hàng để chọn sản phẩm của bạn</p>
                        </div>

                        <div class="paging-cart">
                            <a href="{{ route('product.list') }}" class="prev">
                                <i class="icon-arrow-14"></i> Trở về trang Shop
                            </a>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <form @submit.stop.prevent="updateItemCart()">
                        <div class="wrap-table">
                            <table class="table-cart productListCart">
                                <tr>
                                    <th class="delete">
                                        <span class="delete-all" @click="removeAllItemCart()">
                                            <img src="{{ asset('assets/images/svg/remove.svg') }}" alt="Xóa tất cả" title="Xóa tất cả" style="cursor: pointer"/>
                                        </span>
                                    </th>
                                    <th class="image">Hình ảnh</th>
                                    <th class="product">Sản phẩm</th>
                                    <th class="price">Giá</th>
                                    <th class="number">Số lượng</th>
                                    <th class="subtotal">Tổng cộng</th>
                                </tr>
                                <tr class="item-cart" v-for="(product, index) in listItemCart" :key="index">
                                    <td class="delete"><span class="remove" @click="removeItemCart(product, index)"><i class="icon-close"></i></span></td>
                                    <td class="image">
                                        <a :href="product.url">
                                            <img :src="WifeCart.pathImageProduct + product.pictures" :alt="product.name"/>
                                        </a>
                                    </td>
                                    <td class="product">
                                        <a :href="product.url" class="title">@{{ product.name}}</a>
                                    </td>
                                    <td class="price">
                                        <span class="product-price">@{{ product.actual_price | formatPrice }}</span>
                                    </td>
                                    <td class="number">
                                        <div class="qualitys">
                                            <a href="javascript:void(0)" class="minus" @click="decrementQuantity(product)"><i class="icon-minus"></i></a>
                                            <input type="number" value="1" min="1" max="10" v-model.number="product.item_cart_quantity" @change="changeQuantity(product)"/>
                                            <a href="javascript:void(0)" class="plus" @click="incrementQuantity(product)"><i class="icon-plus"></i></a>
                                        </div>
                                    </td>
                                    <td class="subtotal">
                                        <span class="finalPrice">@{{ product.item_cart_sum | formatPrice }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="promotion-total">
                            <div class="row end">
                                <div class="col-md-5 sub-total final-price">
                                    <span class="item-amount">
                                        Thành tiền <span class="price">@{{ totalPrice | formatPrice }}</span>
                                    </span>
                                    <div class="final-total total wtotal">
                                        <span class="desc">Tổng cộng</span>
                                        <span id="total-amount" class="price">@{{ totalPrice | formatPrice }}</span>
                                    </div>
                                </div>
                                {{--<div class="col-md-7">
                                    <div class="promotion">
                                        Phiếu mua hàng
                                        <form action="" class="code">
                                            <input type="text" placeholder="Gõ Coupon tại đây">
                                            <button>Áp dụng</button>
                                        </form>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                        <div class="paging-cart">
                            <a href="{{ route('product.list') }}" class="prev">
                                <i class="icon-arrow-14"></i> Trở về trang Shop
                            </a>
                            <button type="submit" class="btn next btn-checkout">Thanh toán <i class="icon-arrow-14"></i></button>
                        </div>
                    </form>
                </template>
            </div>

        </main>
    </div>
@endsection
@push('scripts')
    <script>
      const MAX_NUMBER = 10
      const MIN_NUMBER = 1

      new Vue({
        el: '#wrapper',
        data: {
          quantity: 1,
        },
        created () {
          this.getListItemCart()
        },
        methods: {
          changeQuantity (product) {
            let itemCurrent = _.find(this.listItemCart, ['id', product.id])
            let quantityItem = itemCurrent.item_cart_quantity
            itemCurrent.item_cart_quantity = (quantityItem > MAX_NUMBER) ? MAX_NUMBER : ((quantityItem < MIN_NUMBER) ? MIN_NUMBER : quantityItem)
            itemCurrent.item_cart_sum = itemCurrent.item_cart_quantity * itemCurrent.actual_price
            this.totalPrice = _.sumBy(this.listItemCart, 'item_cart_sum')
          },
          decrementQuantity (product) {
            let itemCurrent = _.find(this.listItemCart, ['id', product.id])
            let quantityItem = itemCurrent.item_cart_quantity
            itemCurrent.item_cart_quantity = (quantityItem < 2) ? MIN_NUMBER : quantityItem - 1
            itemCurrent.item_cart_sum = itemCurrent.item_cart_quantity * itemCurrent.actual_price
            this.totalPrice = _.sumBy(this.listItemCart, 'item_cart_sum')
          },
          incrementQuantity (product) {
            let itemCurrent = _.find(this.listItemCart, ['id', product.id])
            let quantityItem = itemCurrent.item_cart_quantity
            itemCurrent.item_cart_quantity = (quantityItem > MAX_NUMBER) ? MAX_NUMBER : quantityItem + 1
            itemCurrent.item_cart_sum = itemCurrent.item_cart_quantity * itemCurrent.actual_price
            this.totalPrice = _.sumBy(this.listItemCart, 'item_cart_sum')
          },
        }
      })
    </script>
@endpush
