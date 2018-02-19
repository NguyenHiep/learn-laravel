<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')"/>
  <meta name="keywords" content="@yield('keywords')"/>
  <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700ii%7CRoboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">
  
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/ion.rangeSlider.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/ion.rangeSlider.skinFlat.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/jquery.bxslider.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/jquery.fancybox.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/flexslider.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/swiper.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/swiper.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/media.css') }}">
  {{--<link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/theme-ecommerce.css') }}">--}}
  @php
    echo '<script type="text/javascript">
		          var ajaxcalls_vars = {
                "token":  "'.csrf_token().'",
                "host" : "'.url("/").'"
			        }
		      </script>';
  @endphp
</head>
<body>
@include('frontend.theme-ecommerce._includes._header')
@yield('content')
@include('frontend.theme-ecommerce._includes._footer')
<!-- jQuery plugins/scripts - start -->
{{--<script src="{{ asset('/theme-ecommerce/js/theme-ecommerce.js') }}"></script>--}}
<script src="{{ asset('/theme-ecommerce/js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/fancybox/fancybox.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/fancybox/helpers/jquery.fancybox-thumbs.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/swiper.jquery.min.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/progressbar.min.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/jQuery.Brazzers-Carousel.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/plugins.js') }}"></script>
<script src="{{ asset('/theme-ecommerce/js/main.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhAYvx0GmLyN5hlf6Uv_e9pPvUT3YpozE"></script>
<script src="{{ asset('/theme-ecommerce/js/gmap.js') }}"></script>
<!-- jQuery plugins/scripts - end -->

</body>
</html>