@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container stylization maincont">
      <!-- Contact Form -->
      <div class="contactform-wrap">
        <form action="#" class="form-validate">
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
            <label class="contactform-label">Địa chỉ nhận hàng <span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input">
              <label for="receiver_address_type1"><input id="receiver_address_type1" type="radio" name="receiver_address_type" value="1" checked="checked"/> Nhà riêng</label>
              <label for="receiver_address_type2"><input id="receiver_address_type2" type="radio" name="receiver_address_type" value="2" /> Tòa nhà(chung cư)</label>
            </span>
          </p>
          <p class="contactform-field contactform-text">
            <label class="contactform-label">Số điện thoại 1 <span class="form-required">*</span></label><!-- NO SPACE --><span class="contactform-input"><input placeholder="" type="text" name="receiver_phone_1" data-required="text"></span>
          </p>
          <p class="contactform-field contactform-text">
            <label class="contactform-label">Số điện thoại 2</label><!-- NO SPACE --><span class="contactform-input"><input placeholder="" type="text" name="receiver_phone_2" data-required="text"></span>
          </p>
          <p class="contactform-field contactform-textarea">
            <label class="contactform-label">Ghi chú</label><!-- NO SPACE --><span class="contactform-input"><textarea placeholder="Ghi chú" name="note" data-required="text"></textarea></span>
          </p>
          <p class="contactform-submit">
            <input value="Xác nhận" type="submit">
          </p>
        </form>
      </div>
    </section>
  </main>
  <!-- Main Content - end -->
@endsection