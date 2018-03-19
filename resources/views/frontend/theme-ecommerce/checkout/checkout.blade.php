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
              <p class="contactform-field contactform-checkbox"><!-- NO SPACE --><span class="contactform-input">
              <label for="delivery_type"><input id="delivery_type" type="checkbox" name="delivery_type" value="2">Địa chỉ nhận hàng khác địa chỉ người mua </label></span>
              </p>
              <div id="order_buyer" style="display: none;">
                <p class="text-uppercase order-label"><strong>Người mua</strong></p>
                @php $key = 'order_deliveries.buyer_email' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Email <span class="form-required">*</span></label><span class="contactform-input">{{ Form::email(convert_input_name($key), old($key), ['placeholder' => 'Email của bạn']) }}</span>
                </p>
                @php $key = 'order_deliveries.buyer_name' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Họ tên <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'Họ tên của bạn']) }}</span>
                </p>
                @php $key = 'order_deliveries.buyer_address_type' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Giao hàng<span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">
                  @if(!empty(__('selector.address_type')))
                    @foreach(__('selector.address_type') as $k => $val)
                      @if($k === STATUS_ENABLE)
                        <label for="{{ convert_input_name($key).$loop->index }}"> {!! Form::radio(convert_input_name($key), $k, true, [ 'id' => convert_input_name($key).$loop->index, 'class' => 'address-type']) !!}    {{$val }} </label>
                      @else
                          <label for="{{ convert_input_name($key).$loop->index }}"> {!! Form::radio(convert_input_name($key), $k, null, [ 'id' => convert_input_name($key).$loop->index, 'class' => 'address-type']) !!}    {{$val }} </label>
                      @endif
                    @endforeach
                  @endif
                  </span>
                </p>
                @php $key = 'order_deliveries.buyer_address' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Địa chỉ <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: 34 Lê Duẩn, Phường Bến Nghé, Quận 1, Hồ Chí Minh']) }}</span>
                </p>
                @php $key = 'order_deliveries.buyer_address_detail' @endphp
                <p class="contactform-field contactform-text address-detail" style="display: none">
                  <label class="contactform-label">Chi tiết <span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: Romea-Tầng 6-Công ty ABC (hoăc Phòng A-15)']) }}</span>
                </p>
                @php $key = 'order_deliveries.buyer_phone_1' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Điện thoại <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: 0908 091 912']) }}</span>
                </p>
              </div>
              <div id="order_receiver">
                <p class="text-uppercase order-label" style="display: none"><strong>Người nhận</strong></p>
                @php $key = 'order_deliveries.receiver_email' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Email <span class="form-required">*</span></label><span class="contactform-input">{{ Form::email(convert_input_name($key), old($key), ['placeholder' => 'Email của bạn']) }}</span>
                </p>
                @php $key = 'order_deliveries.receiver_name' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Họ tên <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'Họ tên của bạn']) }}</span>
                </p>
                @php $key = 'order_deliveries.receiver_address_type' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Giao hàng<span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">
                  @if(!empty(__('selector.address_type')))
                      @foreach(__('selector.address_type') as $k => $val)
                        @if($k === STATUS_ENABLE)
                          <label for="{{ convert_input_name($key).$loop->index }}"> {!! Form::radio(convert_input_name($key), $k, true, [ 'id' => convert_input_name($key).$loop->index, 'class' => 'address-type']) !!}    {{$val }} </label>
                        @else
                          <label for="{{ convert_input_name($key).$loop->index }}"> {!! Form::radio(convert_input_name($key), $k, null, [ 'id' => convert_input_name($key).$loop->index, 'class' => 'address-type']) !!}    {{$val }} </label>
                        @endif
                      @endforeach
                    @endif
                  </span>
                </p>
                @php $key = 'order_deliveries.receiver_address_1' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Địa chỉ <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: 34 Lê Duẩn, Phường Bến Nghé, Quận 1, Hồ Chí Minh']) }}</span>
                </p>
                @php $key = 'order_deliveries.receiver_address_2' @endphp
                <p class="contactform-field contactform-text address-detail" style="display: none">
                  <label class="contactform-label">Chi tiết <span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: Romea-Tầng 6-Công ty ABC (hoăc Phòng A-15)']) }}</span>
                </p>
                @php $key = 'order_deliveries.receiver_phone_1' @endphp
                <p class="contactform-field">
                  <label class="contactform-label">Điện thoại <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: 0908 091 912']) }}</span>
                </p>
                @php $key = 'note' @endphp
                <p class="contactform-field contactform-textarea">
                  <label class="contactform-label">Ghi chú đơn hàng</label><!-- NO SPACE --><span class="contactform-input">{{ Form::textarea($key, old($key), [ 'placeholder' => 'Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn.']) }}</span>
                </p>
              </div>
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
            @if(count($payment_options) > 0)
            <div class="payment-option">
              <h3 class="component-ttl component-ttl-ct component-ttl-hasdesc"><span>Phương thức thanh toán</span></h3>
                <ul class="list-unstyled">
                  @php $key = 'payment_id' @endphp
                  @foreach($payment_options as $payment_method)
                  <li>
                    <label for="payment_method_{{ $loop->index + 1 }}">
                      {{ Form::radio($key, $payment_method['id'], null, ['id' => 'payment_method_'.($loop->index + 1), 'class' => 'payment-method'] ) }} {{ $payment_method['name'] }}
                    </label>
                    <div class="payment_box payment_method_{{ $loop->index + 1 }}" style="display: none;">
                     {!! $payment_method['description'] !!}
                    </div>
                  </li>
                  @endforeach
                </ul>
            </div>
            @endif
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

	elemBody.find('input[name=delivery_type]').on('change', function () {
		var buyerEle    = $('#order_buyer'),
		    receiverEle = $('#order_receiver');
		    buyerEle.toggle();
		    receiverEle.find('.order-label').toggle();

    var buyerEmail = buyerEle.find('input[name="order_deliveries[buyer_email]"]');
    if (buyerEmail.val().trim() === '') {
      buyerEmail.val(receiverEle.find('input[name="order_deliveries[receiver_email]"]').val());
    }

    var buyerName = buyerEle.find('input[name="order_deliveries[buyer_name]"]');
    if (buyerName.val().trim() === '') {
      buyerName.val(receiverEle.find('input[name="order_deliveries[receiver_name]"]').val());
    }

    var buyerPhone1 = buyerEle.find('input[name="order_deliveries[buyer_phone_1]"]');
    if (buyerPhone1.val().trim() === '') {
      buyerPhone1.val(receiverEle.find('input[name="order_deliveries[receiver_phone_1]"]').val());
    }
    
	});
 
	elemBody.find('input.address-type').on('change', function () {
		$(this).parent().parent().parent().next().next().toggle();
	});
 
	elemBody.find('input.payment-method').on('click', function () {
		var inputValue = $(this).attr('value');
		var targetBox  = $('.payment_method_' + inputValue);
		$('.payment_box').not(targetBox).hide();
		$(targetBox).show();
	});
 
</script>
@endpush