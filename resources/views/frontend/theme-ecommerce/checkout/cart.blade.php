@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <script> var page = 'cart'; </script>
  <main>
    <section class="container stylization maincont">
      <ul class="b-crumbs">
        <li>
          <a href="{{ URL::to('/') }}">Trang chủ</a>
        </li>
        <li>
          <span>Giỏ hàng</span>
        </li>
      </ul>
      <h1 class="main-ttl"><span>Giỏ hàng của bạn</span></h1>
      
        <form action="javascript:void(0)" id="form_cart" method="POST">
          <div class="cart-items-wrap">
            @if(!empty($products))
            <table class="cart-items">
              <thead>
              <tr>
                <td class="cart-image">Hình ảnh</td>
                <td class="cart-ttl">Thông tin</td>
                <td class="cart-price">Giá tiền</td>
                <td class="cart-quantity">Số lượng</td>
                <td class="cart-summ">Đơn giá</td>
                <td class="cart-del">&nbsp;</td>
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
                    <div> {!! $product->short_description !!} </div>
                  </td>
                  <td class="cart-price">
                    <b>{{ format_price($product->price) }}</b>
                  </td>
                  <td class="cart-quantity">
                    <p class="cart-qnt">
                      @php $key = 'product.'.$product->id.'.quantity' @endphp
                      <input name="{{ convert_input_name($key) }}" value="{{ $product->item_cart_quantity }}" type="text"  class="quantity_item" readonly/>
                      <a href="javascript:void(0)" class="cart-plus plus_quantity"><i class="fa fa-angle-up"></i></a>
                      <a href="javascript:void(0)" class="cart-minus minus_quantity"><i class="fa fa-angle-down"></i></a>
                      @php $key = 'product.'.$product->id.'.price' @endphp
                      <input type="hidden" name="{{ convert_input_name($key) }}" id="price{{ $product->id }}" value="{{ $product->price }}">
                      @php $key = 'product.'.$product->id.'.id' @endphp
                      <input type="hidden" name="{{ convert_input_name($key) }}" id="product_id{{ $product->id }}" value="{{ $product->id }}">
                    </p>
                  </td>
                  <td class="cart-summ">
                    <b>{{ format_price($product->item_cart_sum) }}</b>
                    {{--<p class="cart-forone">unit price <b>{{ format_price($product->item_cart_sum) }}</b></p>--}}
                  </td>
                  <td class="cart-del">
                    <a href="javascript:void(0)" class="cart-remove" data-id="{{ $product->id }}"></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
              <p>Chưa có sản phẩm trong giỏ hàng của bạn.</p>
              <a href="{{ route('home') }}" class="btn-main">Tiếp tục mua hàng</a>
            @endif
          </div>
          @if(!empty($products))
          <ul class="cart-total">
            <li class="cart-summ">Tổng tiền: <b>{{ format_price($total_price) }}</b></li>
          </ul>
          
          <div class="cart-submit">
            <div class="cart-coupon">
              <input placeholder="Mã giảm giá" type="text">
              <a class="cart-coupon-btn" href="#"><img src="{{ asset('img/ok.png') }}" alt="Mã giảm giá"></a>
            </div>
            <a href="{{ route('home') }}" class="btn-main">Tiếp tục mua hàng</a>
            <a href="javascipt:void(0)" class="btn-main update_cart">Cập nhật giỏ hàng <i class="fa fa-spinner fa-spin" style="display: none;"></i></a>
            <a href="{{ route('checkout.index') }}" class="cart-submit-btn btn-main" data-update=false>Thanh toán</a>
            <a href="javascipt:void(0)" class="cart-clear">Xóa giỏ hàng</a>
          </div>
          @endif
        </form>
     
    </section>
  </main>
@endsection