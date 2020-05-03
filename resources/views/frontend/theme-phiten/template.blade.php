<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('theme-phiten/assets/images/favicon.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-phiten/assets/css/main.css') }}">
    @stack('styles')
</head>

<body>
<div id="wrapper">
    @includeIf('frontend.theme-phiten._includes._header')
    @if(!request()->routeIs('home'))
        @includeIf('frontend.theme-phiten.template-parts.breadcrumb')
    @endif
    @yield('content')
    @includeIf('frontend.theme-phiten._includes._footer')
    @includeIf('frontend.theme-phiten._modules.login-register')
    <script src="{{ asset('theme-phiten/assets/js/jquery.js') }}"></script>
    <script src='{{ asset('theme-phiten/assets/js/bootstrap.min.js') }}'></script>
    <script src='{{ asset('theme-phiten/assets/js/script.js') }}'></script>
    @stack('scripts')
</div>
</body>
</html>