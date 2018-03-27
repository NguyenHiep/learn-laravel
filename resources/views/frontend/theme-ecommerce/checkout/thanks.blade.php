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
          <span>Đặt hàng thành công</span>
        </li>
      </ul>
      <h1 class="main-ttl"><span>Đặt hàng thành công</span></h1>
      <p>Cảm ơn bạn đã đặt hàng trên esdesignweb.com, chúng tôi sẽ liên hệ với bạn sớm nhất, chúc bạn một ngày tốt lành</p>
      <p>
        <a href="{{ route('home') }}">Trở về</a>
      </p>
    </section>
  </main>
@endsection