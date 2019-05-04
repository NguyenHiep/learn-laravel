<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')"/>
  <meta name="keywords" content="@yield('keywords')"/>
  <link href="//fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700ii%7CRoboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/theme-ecommerce/css/theme-ecommerce.css') }}">
  @php
    echo '<script type="text/javascript">
       var ajaxcalls_vars = {
          "token":  "' . csrf_token() . '",
          "host" : "' . url("/") . '"
       }
     </script>';
  @endphp
</head>
<body>
<div id="page-preloader" style="display: none;">
  <div class="page-loading">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
  </div>
</div>
@include('frontend.theme-ecommerce._includes._header')
@yield('content')
@include('frontend.theme-ecommerce._includes._footer')
<!-- Quick View Product - start -->
<div class="qview-modal"></div>
<!-- Quick View Product - end -->
<!-- jQuery plugins/scripts - start -->
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDhAYvx0GmLyN5hlf6Uv_e9pPvUT3YpozE"></script>
<script src="{{ asset('/theme-ecommerce/js/theme-ecommerce.js') }}"></script>
@stack('scripts')
<script type="text/javascript">
	// Config notifation
	toastr.options = {
		"closeButton": true,
		"debug": false,
		"positionClass": "toast-top-right",
		"showDuration": "1000",
		"hideDuration": "5000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

	function show_message(data) {
		console.log(data.status);
		var status = data.status;
		switch (status) {
			case 'success':
				toastr["success"](data.message, "Thông báo")
				break;
			case 'warning':
				toastr["warning"](data.message, "Thông báo")
				break;
			case 'info':
				toastr["info"](data.message, "Thông báo")
				break;
			default:
				toastr["error"](data.message, "Thông báo")
		}

	}
</script>
@if(!empty(session('message')) && !empty(session('status')))
  @php echo '<script>
              var messages = {
                status: "'.session('status').'",
                message: "'.session('message').'"
                }
              show_message(messages);
            </script>';
  @endphp
@endif
</body>
</html>