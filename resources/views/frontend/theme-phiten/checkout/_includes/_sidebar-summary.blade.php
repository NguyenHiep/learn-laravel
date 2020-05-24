<div class="widget widget-summary">
    <div class="widget-title">Tổng giỏ hàng</div>
    <div class="widget-content cart-total cart-summary">
        <div class="item item-amount">
            <span class="desc">Thành tiền</span>
            <span class="price-wrapper"><span class="price">@{{ totalPrice | formatPrice }}</span></span>
        </div>

        <div class="item shipping_price">
            <span class="desc">Phí vận chuyển</span>
            <span class="price-wrapper"><span class="price price_shipping">+ 0</span></span>
        </div>

        <div class="item available-shipping-methods" style="display: none">
            <span class="desc">Phí vận chuyển</span>

            <div class="form-group row">

                <div class="col-6">
                    <div class="item">
                        <label class="radio block">
                            <input type="radio" name="shipping_method" class="shipping-method" value="free_shipping" id="free_shipping" checked="">
                            <span></span>Free Shipping
                        </label>
                        <span class="price">0&nbsp;₫</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="item">
                        <label class="radio block">
                            <input type="radio" name="shipping_method" class="shipping-method"
                                   value="local_pickup" id="local_pickup">
                            <span></span>Local Pickup
                        </label>
                        <span class="price">0&nbsp;₫</span>
                    </div>
                </div>
            </div>
        </div>

        <div id="taxes" class=""></div>

        <div class="item final-total total">
            <span class="desc"> Tổng cộng</span>
            <span id="total-amount"><span class="price">@{{ totalPrice | formatPrice }}</span></span>
        </div>
        <div id="stripe-payment" class="item" style="display: none">
            <div id="card-element"></div>
        </div>

        <div class="checkout-terms checkbox text-center" style="display: none">
            <input type="checkbox" name="terms_and_conditions" id="terms-and-conditions" class="styled-checkbox checked" />
            <label for="terms-and-conditions" class="checked">
                Tôi đồng ý với <a href="#">Điều khoản &amp; điều kiện</a>
            </label>
        </div>
        <button :disabled="loading" v-if="step_process === STEP_CONFIRM" type="submit" @click="checkout = true" class="round full btn btn-primary btn-checkout">Đặt hàng</button>
    </div>
</div>