@extends('frontend.theme-phiten.template')

@section('title', 'Trang chủ - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('content')
    @includeIf('frontend.theme-phiten._sections.home_banner')
{{--    @includeIf('frontend.theme-phiten._sections.home_sec-1')--}}
    @includeIf('frontend.theme-phiten._sections.home_sec-2')
    @includeIf('frontend.theme-phiten._sections.home_sec-3')
@endsection
@push('scripts')
    <script src='{{ asset('theme-phiten/assets/js/owl.carousel.min.js') }}'></script>
    <script src='{{ asset('theme-phiten/assets/js/imagesloaded.pkgd.min.js') }}'></script>
    <script src='{{ asset('theme-phiten/assets/js/script_owl.js') }}'></script>
@endpush