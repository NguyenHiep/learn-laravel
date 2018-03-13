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
        <div class="col-md-6 col-sm-6">
          <h3 class="component-ttl component-ttl-ct component-ttl-hasdesc"><span>Thông tin đơn hàng</span></h3>
          <div class="cart-items-wrap">
          
          </div>
          <table class="cart-items cart-items-checkout">
            <thead>
            <tr>
              <td class="cart-image">Hình ảnh</td>
              <td class="cart-ttl">Thông tin</td>
              <td class="cart-price">Giá tiền</td>
              <td class="cart-quantity">Số lượng</td>
              <td class="cart-summ">Đơn giá</td>
            </tr>
            </thead>
            <tbody>
    
            @foreach($products as $product)
              <tr>
                <td class="cart-image">
                  <a href="{{ route('product.show', $product->slug) }}">
                    @if(!empty($product->pictures))
                      <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
                    @else
                      <img src="http://placehold.it/61x80" alt="{{ $product->name }}" title="{{ $product->name }}">
                    @endif
                  </a>
                </td>
                <td class="cart-ttl">
                  <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                  <p><b>SKU:</b> {{ $product->sku }}</p>
                </td>
                <td class="cart-price">
                  <b>{{ format_price($product->price) }}</b>
                </td>
                <td class="cart-quantity">
                  <p class="cart-qnt">{{ $product->item_cart_quantity }}</p>
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
        </div>
        <div class="col-md-6 col-sm-6">
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
        </div>
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