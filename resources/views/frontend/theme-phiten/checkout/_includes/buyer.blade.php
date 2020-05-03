<div id="order_buyer" style="display: none;">
  <p class="text-uppercase order-label"><strong>Người mua</strong></p>
  @php $key = 'buyer_email' @endphp
  <p class="contactform-field">
    <label class="contactform-label">Email <span class="form-required">*</span></label><span class="contactform-input">{{ Form::email(convert_input_name($key), old($key), ['placeholder' => 'Email của bạn']) }}</span>
    @if ($errors->has(convert_input_name($key))) <label class="contactform-label"> </label><span class="form-required">{{$errors->first(convert_input_name($key))}}</span>  @endif
  </p>
  @php $key = 'buyer_name' @endphp
  <p class="contactform-field">
    <label class="contactform-label">Họ tên <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'Họ tên của bạn']) }}</span>
    @if ($errors->has(convert_input_name($key))) <label class="contactform-label"> </label><span class="form-required">{{$errors->first(convert_input_name($key))}}</span>  @endif
  </p>
  @php $key = 'buyer_address_type' @endphp
  <p class="contactform-field">
    <label class="contactform-label">Giao hàng<span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">
      @if(!empty(__('selector.address_type')))
        @foreach(__('selector.address_type') as $k => $val)
          @if($k === config('define.STATUS_ENABLE'))
            <label for="{{ convert_input_name($key).$loop->index }}"> {!! Form::radio(convert_input_name($key), $k, true, [ 'id' => convert_input_name($key).$loop->index, 'class' => 'address-type']) !!}    {{$val }} </label>
          @else
            <label for="{{ convert_input_name($key).$loop->index }}"> {!! Form::radio(convert_input_name($key), $k, null, [ 'id' => convert_input_name($key).$loop->index, 'class' => 'address-type']) !!}    {{$val }} </label>
          @endif
        @endforeach
      @endif
    </span>
    @if ($errors->has(convert_input_name($key))) <label class="contactform-label"> </label><span class="form-required">{{$errors->first(convert_input_name($key))}}</span>  @endif
  </p>
  @php $key = 'buyer_address' @endphp
  <p class="contactform-field">
    <label class="contactform-label">Địa chỉ <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: 34 Lê Duẩn, Phường Bến Nghé, Quận 1, Hồ Chí Minh']) }}</span>
    @if ($errors->has(convert_input_name($key))) <label class="contactform-label"> </label><span class="form-required">{{$errors->first(convert_input_name($key))}}</span>  @endif
  </p>
  @php $key = 'buyer_address_2' @endphp
  <p class="contactform-field contactform-text buyer_address_2" style="display: none">
    <label class="contactform-label">Chi tiết <span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: Romea-Tầng 6-Công ty ABC (hoăc Phòng A-15)']) }}</span>
    @if ($errors->has(convert_input_name($key))) <label class="contactform-label"> </label><span class="form-required">{{$errors->first(convert_input_name($key))}}</span>  @endif
  </p>
  @php $key = 'buyer_phone_1' @endphp
  <p class="contactform-field">
    <label class="contactform-label">Điện thoại <span class="form-required">*</span></label><span class="contactform-input">{{ Form::text(convert_input_name($key), old($key), ['placeholder' => 'VD: 0908 091 912']) }}</span>
    @if ($errors->has(convert_input_name($key))) <label class="contactform-label"> </label><span class="form-required">{{$errors->first(convert_input_name($key))}}</span>  @endif
  </p>
</div>