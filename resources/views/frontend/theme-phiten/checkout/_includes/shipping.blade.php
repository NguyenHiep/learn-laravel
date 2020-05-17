<div class="form-address">
    <h6>
        Bạn có tài khoản? Vui lòng <a href="#" data-toggle="modal" data-target="#myLogin" id="flogin">đăng nhập.</a>
        Hoặc bấm <a href="#" data-toggle="modal" data-target="#myLogin" id="fregister">vào đây</a> để tạo tài khoản mới
    </h6>
    @includeIf('frontend.theme-phiten.checkout._includes._shipping-buyer')
    <div class="checkbox ship-to-a-different-address clicked">
        <input type="hidden" name="ship_to_a_different_address" value="0">
        <input type="checkbox" name="ship_to_a_different_address" class="styled-checkbox " id="ship-to-a-different-address" value="1">
        <label for="ship-to-a-different-address">
            <p>Gửi đến địa chỉ khác</p>
        </label>
    </div>
    @includeIf('frontend.theme-phiten.checkout._includes._shipping-receiver')
    <div class="paging-cart hidden-xs">
        <a href="{{ route('checkout.cart.index') }}" class="prev"><i class="icon-arrow-14"></i> Quay trở lại </a>
        <button type="button" class="btn next next-step ">Tiếp tục <i class="icon-arrow-14"></i></button>
    </div>
</div>