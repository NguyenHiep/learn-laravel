@extends('frontend.theme-phiten.template')

@section('title', 'Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('content')
    <div class="entry-heading">
        <div class="container">
            <h1>Thanh toán</h1>
        </div>
    </div>
    <main id="main">
        <div class="container">
            <div class="successful">
                <h2>Đơn hàng của bạn đã được đặt!</h2>
                <p><img src="{{ asset('theme-phiten/assets/images/svg/successful.svg') }}" alt=""></p>
                <p>Cảm ơn vì đã mua sắm cùng chúng tôi.</p>
                <div class="desc">
                    @if(Session::has('orderId'))
                        <p>Mã đơn hàng của bạn là<span> # {{ Session::get('orderId') }}</span></p>
                    @endif
                </div>
            </div>
            <div class="paging-cart">
              <a href="{{ route('home') }}" class="prev"><i class="icon-arrow-14"></i> Quay lại trang home</a>
            </div>
        </div>
    </main>
@endsection