@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container stylization maincont">
      <!-- Contact Form -->
      <div class="row">
        <form action="#" class="form-validate">
          <div class="col-md-6 col-sm-6">
            <div class="contactform-wrap">
              
                <h3 class="component-ttl component-ttl-ct component-ttl-hasdesc"><span>Thông tin giao hàng</span></h3>
                {{-- <p class="component-desc component-desc-ct">Địa chỉ nhận hàng khác địa chỉ người mua</p>--}}
                <p class="contactform-field contactform-checkbox">
                  <label class="contactform-label"></label><!-- NO SPACE --><span class="contactform-input">
                <label for="delivery_type"><input id="delivery_type" type="checkbox" name="delivery_type">Địa chỉ nhận hàng khác địa chỉ người mua </label></span>
                </p>
                <p class="contactform-field contactform-email">
                  <label class="contactform-label">E-mail <span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input"><input placeholder="E-mail của bạn" type="email" name="email" data-required="text" data-required-email="email"></span>
                </p>
                <p class="contactform-field contactform-text">
                  <label class="contactform-label">Họ tên <span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input"><input placeholder="Họ tên của bạn" type="text" name="name" data-required="text"></span>
                </p>
                <p class="contactform-field contactform-radio">
                  <label class="contactform-label">Địa chỉ<span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">
                <label for="receiver_address_type1"><input id="receiver_address_type1" type="radio" name="receiver_address_type" value="1" checked="checked"/> Nhà riêng</label>
                <label for="receiver_address_type2"><input id="receiver_address_type2" type="radio" name="receiver_address_type" value="2" /> Tòa nhà(chung cư)</label>
              </span>
                </p>
                <p class="contactform-field contactform-text">
                  <label class="contactform-label">Điện thoại<span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input"><input placeholder="" type="text" name="receiver_phone_1" data-required="text"></span>
                </p>
                <p class="contactform-field contactform-textarea">
                  <label class="contactform-label">Ghi chú đơn hàng</label><!-- NO SPACE --><span class="contactform-input"><textarea placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." name="note" data-required="text"></textarea></span>
                </p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <h3 class="component-ttl component-ttl-ct component-ttl-hasdesc"><span>Thông tin đơn hàng</span></h3>
            <div class="cart-items-wrap">
      
            </div>
            <table class="cart-items cart-items-checkout">
              <thead>
              <tr>
                <td class="cart-ttl" style="width: 270px;">Tên sản phẩm</td>
                <td class="cart-price">Giá tiền</td>
                <td class="cart-summ">Đơn giá</td>
              </tr>
              </thead>
              <tbody>
        
              @foreach($products as $product)
                <tr>
                  <td class="cart-ttl">
                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a> x <b>{{ $product->item_cart_quantity }}</b>
                  </td>
                  <td class="cart-price">
                    <b>{{ format_price($product->price) }}</b>
                  </td>
                  <td class="cart-summ">
                    <b>{{ format_price($product->item_cart_sum) }}</b>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            <ul class="cart-total">
              <li class="cart-summ">Tổng tiền: <b>{{ format_price($total_price) }}</b></li>
            </ul>
            <div class="payment-option">
                <ul class="list-unstyled">
                  <li>
                    <label for="payment_method_paypal"><input type="radio" name="payment_method" value="paypal" id="payment_method_paypal">Thanh toán qua paypal</label>
                    <div class="payment_box payment_method_paypal" style="display: block;">
                      <p>Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                    </div>
                  </li>
                  <li>
                    <label for="payment_method_bank"><input type="radio" name="payment_method" value="bank" id="payment_method_bank">Chuyển khoản ngân hàng</label>
                    <div class="payment_box payment_method_bank" style="display: block;">
                      <p>Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                    </div>
                  </li>
                  <li><label for="payment_method_home"><input type="radio" name="payment_method" value="home" id="payment_method_home">Trả tiền mặt khi nhận hàng</label>
                    <div class="payment_box payment_method_home" style="display: block;">
                      <p>Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                    </div>
                  </li>
                </ul>
            </div>
            <p class="contactform-submit">
              <input value="Đặt hàng" type="submit">
            </p>
            
          </div>
        </form>
      </div>
    </section>
  </main>
  <!-- Main Content - end -->
@endsection
@push('scripts')
<script>
  "use strict";
  
</script>
@endpush