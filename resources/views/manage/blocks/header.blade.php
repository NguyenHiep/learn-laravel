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
    <link rel="stylesheet" href="{{ asset('/manages/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manages/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/manage/app.css') }}">

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
</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">