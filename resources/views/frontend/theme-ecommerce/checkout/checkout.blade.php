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
        {!! Form::open(['route' => 'checkout.save', 'class' => 'form-validate']) !!}
          <div class="col-md-6 col-sm-6">
            <div class="contactform-wrap">
              
                <h3 class="component-ttl component-ttl-ct component-ttl-hasdesc"><span>Thông tin giao hàng</span></h3>
                {{-- <p class="component-desc component-desc-ct">Địa chỉ nhận hàng khác địa chỉ người mua</p>--}}
                {{--<p class="contactform-field contactform-checkbox">
                  <label class="contactform-label"></label><!-- NO SPACE --><span class="contactform-input">
                <label for="delivery_type"><input id="delivery_type" type="checkbox" name="delivery_type">Địa chỉ nhận hàng khác địa chỉ người mua </label></span>
                </p>--}}
                @php $key = 'order_deliveries.buyer_email' @endphp
                <p class="contactform-field contactform-email">
                  <label class="contactform-label">Email <span class="form-required">*</span></label><span class="contactform-input">{{ Form::email(convert_input_name($key), old($key), ['placeholder' => 'Email của bạn']) }}</span>
                </p>
  
                @php $key = 'order_deliveries.buyer_name' @endphp
                <p class="contactform-field contactform-email">
                  <label class="contactform-label">Họ tên <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'Họ tên của bạn']) }}</span>
                </p>
              
                <p class="contactform-field contactform-radio">
                  <label class="contactform-label">Giao hàng<span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">
                    <label for="receiver_address_type1"><input id="receiver_address_type1" type="radio" name="receiver_address_type" value="1" checked="checked" class="address-type"/> Nhà riêng</label>
                    <label for="receiver_address_type2"><input id="receiver_address_type2" type="radio" name="receiver_address_type" value="2" class="address-type"/> Tòa nhà(chung cư)</label>
                    </span>
                </p>
              @php $key = 'order_deliveries.buyer_address' @endphp
              <p class="contactform-field contactform-email">
                <label class="contactform-label">Địa chỉ <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: 34 Lê Duẩn, Phường Bến Nghé, Quận 1, Hồ Chí Minh']) }}</span>
              </p>
              @php $key = 'order_deliveries.buyer_address_detail' @endphp
              <p class="contactform-field contactform-text address-detail" style="display: none">
                <label class="contactform-label">Chi tiết <span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: Romea-Tầng 6-Công ty ABC (hoăc Phòng A-15)']) }}</span>
              </p>
              @php $key = 'order_deliveries.buyer_phone_1' @endphp
              <p class="contactform-field contactform-email">
                <label class="contactform-label">Điện thoại <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: 0908 091 912']) }}</span>
              </p>
              @php $key = 'note' @endphp
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
                    <label for="payment_method_paypal"><input type="radio" name="payment_method" value="paypal" id="payment_method_paypal" class="payment-method">Thanh toán qua paypal</label>
                    <div class="payment_box payment_method_paypal" style="display: none;">
                      <p>1Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                    </div>
                  </li>
                  <li>
                    <label for="payment_method_bank"><input type="radio" name="payment_method" value="bank" id="payment_method_bank" class="payment-method">Chuyển khoản ngân hàng</label>
                    <div class="payment_box payment_method_bank" style="display: none;">
                      <p>
                        Thông tin tài khoản <br/>
                        Họ và tên: <strong>Nguyễn Minh Hiệp </strong> <br/>
                        Số tài khoản: <strong>0751 0000 14244</strong> <br/>
                        Ngân hàng: <strong>VietCombank</strong> <br/>
                        Chi nhánh: <strong>Phú Yên</strong> <br/>
                        Số Điện Thoại: <strong>0167 6542 578</strong> <br/>
                        Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.
                      </p>
                    </div>
                  </li>
                  <li><label for="payment_method_home"><input type="radio" name="payment_method" value="home" id="payment_method_home" class="payment-method">Trả tiền mặt khi nhận hàng</label>
                    <div class="payment_box payment_method_home" style="display: none;">
                      <p>3Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                    </div>
                  </li>
                </ul>
            </div>
            <p class="contactform-submit">
              <input value="Đặt hàng" type="submit">
            </p>
            
          </div>
        {!! Form::close() !!}
      </div>
    </section>
  </main>
  <!-- Main Content - end -->
@endsection
@push('scripts')
<script>
  "use strict";
  var elemBody = $('body');
	elemBody.find('input.address-type').on('change', function () {
		$(this).parents('div.contactform-wrap').find('.address-detail').eq(0).toggle();
		var type     = parseInt($(this).val()),
			address1   = $(this).parents('div.contactform-wrap').find('.address input');
		if (type === 2) {
			address1.attr('placeholder', 'VD: 117 Nguyễn Đình Chiểu, Phường 6, Quận 3, Hồ Chí Minh');
		} else {
			address1.attr('placeholder', 'VD: 34 Lê Duẩn, Phường Bến Nghé, Quận 1, Hồ Chí Minh');
		}
		
	});
	
	elemBody.find('input.payment-method').on('click', function () {
		var inputValue = $(this).attr('value');
		var targetBox  = $('.payment_method_' + inputValue);
		$('.payment_box').not(targetBox).hide();
		$(targetBox).show();
  
	});
</script>
@endpush