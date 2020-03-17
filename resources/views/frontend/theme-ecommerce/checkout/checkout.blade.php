@extends('frontend.theme-ecommerce.template')

@section('title', 'Thông tin giao hàng')
@section('description', 'Thông tin giao hàng, cung cấp sỉ và lẻ quần áo')
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
              @php $key = 'delivery_type'@endphp
              <label for="delivery_type">
                {{ Form::checkbox($key, 2, old($key), [ 'id' => $key]) }}Địa chỉ nhận hàng khác địa chỉ người mua </label></span>
              </p>
                @include('frontend.theme-ecommerce.checkout._includes.buyer')
                @include('frontend.theme-ecommerce.checkout._includes.receiver')
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
                <td class="cart-price">Đơn giá</td>
                <td class="cart-summ">Thành tiền</td>
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
                      {{ Form::radio($key, $payment_method['id'], old($key), ['id' => 'payment_method_'.($loop->index + 1), 'class' => 'payment-method'] ) }} {{ $payment_method['name'] }}
                    </label>
                    <div class="payment_box payment_method_{{ $loop->index + 1 }}" style="display: none;">
                     {!! $payment_method['description'] !!}
                    </div>
                  </li>
                  @endforeach
                  @if ($errors->has(convert_input_name($key))) <label class="contactform-label"> </label><span class="form-required">{{$errors->first(convert_input_name($key))}}</span>  @endif
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
  checkDeliveryType();
	elemBody.find('input[name=delivery_type]').on('change', function () {
      checkDeliveryType();
	});

	checkAddressTypeReceiver();
	elemBody.find("input[name='receiver_address_type']").on('change', function () {
		checkAddressTypeReceiver();
	});

	checkAddressTypeBuyer();
	elemBody.find("input[name='buyer_address_type']").on('change', function () {
		checkAddressTypeBuyer();
	});
  
  checkPaymentMethod()
	elemBody.find('input.payment-method').on('click', function () {
      checkPaymentMethod();
	});

	function checkAddressTypeReceiver() {
		var inputValue = parseInt($("input[name='receiver_address_type']:checked").val());
		var address_detail = $('.receiver_address_2');
		if (inputValue === 2) {
			address_detail.show();
		} else {
			address_detail.hide();
		}

	}

	function checkAddressTypeBuyer() {
		var inputValue = parseInt($("input[name='buyer_address_type']:checked").val());
		var address_detail = $('.buyer_address_2');
		if (inputValue === 2) {
			address_detail.show();
		} else {
			address_detail.hide();
		}

	}
	
	function checkPaymentMethod() {
      var inputValue = $("input[name='payment_id']:checked").val();
      var targetBox  = $('.payment_method_' + inputValue);
      $('.payment_box').not(targetBox).hide();
      $(targetBox).show();
  }

  function checkDeliveryType() {
     var checked = $('input[name=delivery_type]').is(':checked');
     if ( checked){
         var buyerEle    = $('#order_buyer'),
             receiverEle = $('#order_receiver');
         buyerEle.toggle();
         receiverEle.find('.order-label').toggle();

         var buyerEmail = buyerEle.find('input[name="buyer_email"]');
         if (buyerEmail.val().trim() === '') {
             buyerEmail.val(receiverEle.find('input[name="receiver_email"]').val());
         }

         var buyerName = buyerEle.find('input[name="buyer_name"]');
         if (buyerName.val().trim() === '') {
             buyerName.val(receiverEle.find('input[name="receiver_name"]').val());
         }

         var buyerPhone1 = buyerEle.find('input[name="buyer_phone_1"]');
         if (buyerPhone1.val().trim() === '') {
             buyerPhone1.val(receiverEle.find('input[name="receiver_phone_1"]').val());
         }
     } else {
         $('#order_buyer').hide();
     }
 }
</script>
@endpush