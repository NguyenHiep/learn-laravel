<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')"/>
  <meta name="keywords" content="@yield('keywords')"/>
  <link href="{{asset('/theme01/css/master.css')}}" rel="stylesheet"
        type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">
  <link href="https://cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
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

@include('frontend.theme-cv._includes._header')
@include('frontend.theme-cv._includes._navtop')
@yield('content')
@include('frontend.theme-cv._includes._footer')
@include('frontend.theme-cv.modals.contact')
@include('frontend.theme-cv.modals.portfolio')
@include('frontend.theme-cv.modals.thanks')
@include('frontend.theme-cv.modals.errors')

<script src="{{asset('/theme01/js/jquery-2.2.3.min.js')}}"></script>
<script src="{{asset('/theme01/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/theme01/js/jquery.placeholder.min.js')}}"></script>
<!--Mix It Up-->
<script src="{{asset('/theme01/assets/mixitup-v3/dist/mixitup.min.js')}}"></script>
<!--THEME-->
<script src="{{asset('/theme01/js/wow.min.js')}}"></script>
<script src="{{asset('/theme01/js/theme.js')}}"></script>
</body>
</html>