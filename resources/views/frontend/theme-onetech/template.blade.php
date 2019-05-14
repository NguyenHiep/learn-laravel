<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="@yield('description')"/>
  <meta name="keywords" content="@yield('keywords')"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('theme-onetech/styles/styles.css') }}">
</head>

<body>

<div class="super_container">
  @include('frontend.theme-onetech._includes._header')
  @yield('content')
  @include('frontend.theme-onetech._includes._footer')
  <script src="{{ asset('theme-onetech/js/main.js') }}"></script>
</div>
</body>

</html>