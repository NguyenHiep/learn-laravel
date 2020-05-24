<div class="widget widget-cart" v-if="listItemCart.length > 0">
    <div class="widget-title"> Danh sách sản phẩm</div>
    <div class="widget-content">
        <ul class="list-mini-product">
            <li class="item" v-for="(product, index) in listItemCart" :key="index">
                <div class="row grid-space-20">
                    <div class="col-5">
                        <a :href="product.url" class="img">
                            <div class="image-holder">
                                <img :src="WifeCart.pathImageProduct + product.pictures" :alt="product.name"/>
                            </div>
                        </a>
                    </div>
                    <div class="col-7">
                        <a :href="product.url" class="title">@{{ product.name}}</a>
                        <div class="number">
                            <label class="">Số lượng:</label>
                            <span>@{{ product.item_cart_quantity }}</span>
                        </div>
                        <div class="price">@{{ product.sale_price | formatPrice }}</div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="text-center viewall">
            <a href="{{ route('checkout.cart.index') }}">Xem thêm</a>
        </div>
    </div>
</div>