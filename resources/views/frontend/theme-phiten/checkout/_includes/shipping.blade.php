<div class="form-address">
    @guest
        <h6>
            Bạn có tài khoản? Vui lòng <a href="#" data-toggle="modal" data-target="#myLogin" id="flogin">đăng nhập.</a>
            Hoặc bấm <a href="#" data-toggle="modal" data-target="#myLogin" id="fregister">vào đây</a> để tạo tài khoản mới
        </h6>
    @endguest
    @includeIf('frontend.theme-phiten.checkout._includes._shipping-buyer')
    <div class="checkbox ship-to-a-different-address clicked">
        <input type="hidden" name="ship_to_a_different_address" value="0">
        <input type="checkbox" v-model="different_address" :class="different_address == 1 ? 'checked' : ''" class="styled-checkbox" id="ship-to-a-different-address" />
        <label for="ship-to-a-different-address">
            <p>Gửi đến địa chỉ khác</p>
        </label>
    </div>
    <template v-if="different_address == 1">
        @includeIf('frontend.theme-phiten.checkout._includes._shipping-receiver')
    </template>
    <div class="paging-cart hidden-xs">
        <a href="{{ route('checkout.cart.index') }}" class="prev"><i class="icon-arrow-14"></i> Quay trở lại </a>
        <button type="submit" class="btn next next-step ">Tiếp tục <i class="icon-arrow-14"></i></button>
    </div>
</div>