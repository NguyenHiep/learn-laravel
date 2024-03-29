<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @stack('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap&subset=vietnamese" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}"/>
    @stack('styles')
</head>

<body>
<div id="wrapper" v-cloak>
    @includeIf('frontend.theme-phiten._includes._header')
    @if(!request()->routeIs('home'))
        @includeIf('frontend.theme-phiten.components.breadcrumb')
    @endif
    @yield('content')
    @includeIf('frontend.theme-phiten._includes._footer')
    @guest
        @if(!request()->routeIs('password.reset'))
            @includeIf('frontend.theme-phiten._modules.login-register')
        @endif
    @endguest
    <script>@includeIf('frontend.theme-phiten.appresources')</script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @includeIf('frontend.theme-phiten.components.alert')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('google.recaptcha_site_key') }}"></script>
    <script src='{{ asset('assets/js/recaptcha.js') }}'></script>
    @stack('scripts')
    <script>
      var vm = new Vue({
        el: '#wrapper',
        created () {
          this.getListItemCart()
        },
      })
    </script>
</div>
</body>
</html>
