@extends('frontend.theme-phiten.template')

@section('title', $record->page_title)

@push('meta')
    <meta name="title" content="{{ $record->page_title }}">
    <meta name="keywords" content="{{ $record->page_keyword }}">
    <meta name="description" content="{{ $record->page_intro }}">
    <meta property="og:title" content="{{ $record->page_title }}">
    <meta property="og:description" content="{{ $record->page_intro }}">
@endpush

@section('breadcrumb')
    <li class="active"><a href="javascript:void(0)">{{ $record->page_title }}</a></li>
@endsection

@section('content')
    <main id="main">
        <section class="container">
            <div class="page-wrapper clearfix has-sidebar">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <ul class="menu-page">
                            <li class=""><a href="/page/faq">Câu hỏi thường gặp</a></li>
                            <li class=""><a href="/page/chinh-sach-bao-mat">Chính sách bảo mật</a></li>
                            <li class=""><a href="/page/chinh-sach-thanh-toan">Chính sách thanh toán</a></li>
                            <li class=""><a href="/page/delivery-policy">Chính sách giao hàng</a></li>
                            <li class=""><a href="/page/return-policy">Chính sách đổi trả</a></li>
                            <li class=""><a href="/page/dieu-khoan-dich-vu">Điều khoản dịch vụ</a></li>
                            <li class=""><a href="/page/career">Tuyển dụng</a></li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8 offset-md-1">
                        <h1 class="page-title">{{ $record->page_title }}</h1>
                        <div class="page-content box-shadow">{!! $record->page_full !!}</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection