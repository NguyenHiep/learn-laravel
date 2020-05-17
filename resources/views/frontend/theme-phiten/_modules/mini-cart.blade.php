<div class="minicart">
    <div class="total">
        Thành tiền: <span>@{{ totalPrice | formatPrice }} </span> <span></span>
    </div>
    <h4 class="title-cart">Giỏ hàng của tôi</h4>
    <ul class="list-mini-product">
        <template v-if="listItemCart.length > 0">
            <li class="item" v-for="(itemCart, index) in listItemCart" :key="index">
                <div class="row grid-space-20">
                    <div class="col-5">
                        <a :href="itemCart.url" class="img">
                            <img :src="WifeCart.pathImageProduct + itemCart.pictures" :alt="itemCart.name"/>
                        </a>
                    </div>
                    <div class="col-7">
                        <a :href="itemCart.url" class="title">@{{ itemCart.name }}</a>
                        <div class="number">Số lượng: @{{ itemCart.item_cart_quantity }}</div>
                        <div class="price">@{{ itemCart.item_cart_sum | formatPrice }}</div>
                    </div>
                </div>
            </li>
        </template>
        <li v-else><h5 class="empty-cart text-center">Giỏ của bạn trống trơn</h5></li>
    </ul>
    <div class="groupbtn" v-if="listItemCart.length > 0">
        <p><a href="{{ route('checkout.cart.index') }}" class="btn btn1 noshadow">Xem giỏ hàng</a></p>
        <p><a href="{{ route('checkout.index') }}" class="btn btn1 noshadow">Thanh toán</a></p>
    </div>
</div>