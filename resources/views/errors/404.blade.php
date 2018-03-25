<!DOCTYPE HTML>
<html>
<head>
  <title>404 not found</title>
  <meta name="keywords" content="404" />
  <link href="{{ asset('theme-ecommerce/404/css/style.css') }}" rel="stylesheet" type="text/css"  media="all" />
</head>
<body>
<!--start-wrap--->
<div class="wrap">
  <!---start-header---->
  <div class="header">
    <div class="logo">
      <h1><a href="#">Ohh</a></h1>
    </div>
  </div>
  <!---End-header---->
  <!--start-content------>
  <div class="content">
    <img src="{{ asset('theme-ecommerce/404/images/error-img.png') }}" title="error" />
    <p><span><label>O</label>hh.....</span>You Requested the page that is no longer There.</p>
    <a href="{{ route('home') }}">Quay về trang chủ</a>
  </div>
  <!--End-Cotent------>
</div>
<!--End-wrap--->
</body>
</html>

