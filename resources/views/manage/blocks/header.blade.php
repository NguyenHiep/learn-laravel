<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
  <meta charset="utf-8"/>
  <title>@yield('title')</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta content="" name="description"/>
  <meta content="nguyenhiep" name="author"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">

@section('styles')
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/manages/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/manages/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('/manages/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/manages/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/manages/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('/manages/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('/manages/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/manages/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/manages/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/manages/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/manages/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/manages/assets/global/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/manages/assets/global/plugins/dropzone/basic.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/manages/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('/manages/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{asset('/manages/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('/manages/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/manages/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet"
          type="text/css" id="style_color"/>
    <link href="{{asset('/manages/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('/manages/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/bootstrap-toastr/toastr.min.js')}}"
            type="text/javascript"></script>
    <!-- END THEME LAYOUT STYLES -->
  @show

  <link rel="shortcut icon" href="favicon.ico"/>
  @php
    echo '<script type="text/javascript">';
    //echo '//<![CDATA[';
		echo ' var ajaxcalls_vars = {
			"token":  "'.csrf_token().'",
			"host" : "'.url("/").'"
		 }';
   // echo ']]>';
  echo '</script>';

  @endphp

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

    function show_message(data) {console.log(data.status);
      if(data.status == 'success')
      {
        toastr["success"](data.message, "Thông báo")
      }
      else if( data.status == 'warning' )
      {
        toastr["warning"](data.message, "Thông báo")
      }
      else
      {
        toastr["error"](data.message, "Thông báo")
      }

    }
  </script>
</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">