<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

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
		<!-- END THEME LAYOUT STYLES -->
		@show

	<link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
<!-- BEGIN HEADER -->

@section('navigation_top')
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner ">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.html">
					<img src="{{asset('/manages/assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
				<div class="menu-toggler sidebar-toggler"> </div>
			</div>
			<!-- END LOGO -->
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">

					<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
							<span class="badge badge-default"> 7 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>
									<span class="bold">12 pending</span> notifications</h3>
								<a href="page_user_profile_1.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
											<span class="time">just now</span>
											<span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">3 mins</span>
											<span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Server #12 overloaded. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">10 mins</span>
											<span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Server #2 not responding. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">14 hrs</span>
											<span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> Application error. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">2 days</span>
											<span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Database overloaded 68%. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">3 days</span>
											<span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> A user IP blocked. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">4 days</span>
											<span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Storage Server #4 not responding dfdfdfd. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">5 days</span>
											<span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> System Error. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">9 days</span>
											<span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Storage server failed. </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-envelope-open"></i>
							<span class="badge badge-default"> 4 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have
									<span class="bold">7 New</span> Messages</h3>
								<a href="app_inbox.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/manages/assets/layouts/layout3/img/avatar2.jpg')}}" class="img-circle" alt=""> </span>
											<span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
											<span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
									<li>
										<a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/manages/assets/layouts/layout3/img/avatar3.jpg')}}" class="img-circle" alt=""> </span>
											<span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
                                                </span>
											<span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
									<li>
										<a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/manages/assets/layouts/layout3/img/avatar1.jpg')}}" class="img-circle" alt=""> </span>
											<span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
                                                </span>
											<span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
									<li>
										<a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/manages/assets/layouts/layout3/img/avatar2.jpg')}}" class="img-circle" alt=""> </span>
											<span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
                                                </span>
											<span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
										</a>
									</li>
									<li>
										<a href="#">
                                                <span class="photo">
                                                    <img src="{{asset('/manages/assets/layouts/layout3/img/avatar3.jpg')}}" class="img-circle" alt=""> </span>
											<span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
                                                </span>
											<span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->

					<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-calendar"></i>
							<span class="badge badge-default"> 3 </span>
						</a>
						<ul class="dropdown-menu extended tasks">
							<li class="external">
								<h3>You have
									<span class="bold">12 pending</span> tasks</h3>
								<a href="app_todo.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
                                                </span>
											<span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Application deployment</span>
                                                    <span class="percent">65%</span>
                                                </span>
											<span class="progress">
                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">65% Complete</span>
                                                    </span>
                                                </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile app release</span>
                                                    <span class="percent">98%</span>
                                                </span>
											<span class="progress">
                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">98% Complete</span>
                                                    </span>
                                                </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Database migration</span>
                                                    <span class="percent">10%</span>
                                                </span>
											<span class="progress">
                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">10% Complete</span>
                                                    </span>
                                                </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Web server upgrade</span>
                                                    <span class="percent">58%</span>
                                                </span>
											<span class="progress">
                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">58% Complete</span>
                                                    </span>
                                                </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile development</span>
                                                    <span class="percent">85%</span>
                                                </span>
											<span class="progress">
                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">85% Complete</span>
                                                    </span>
                                                </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New UI release</span>
                                                    <span class="percent">38%</span>
                                                </span>
											<span class="progress progress-striped">
                                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">38% Complete</span>
                                                    </span>
                                                </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<img alt="" class="img-circle" src="{{asset('/manages/assets/layouts/layout/img/avatar3_small.jpg')}}" />
							<span class="username username-hide-on-mobile"> Nguyễn Hiệp </span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="page_user_profile_1.html">
									<i class="icon-user"></i> Thông tin tài khoản </a>
							</li>

							<li>
								<a href="app_inbox.html">
									<i class="icon-envelope-open"></i> Hộp thư đến
									<span class="badge badge-danger"> 3 </span>
								</a>
							</li>
							<li>
								<a href="app_todo.html">
									<i class="icon-rocket"></i> Công việc mới
									<span class="badge badge-success"> 7 </span>
								</a>
							</li>
							<li class="divider"> </li>
							<li>
								<a href="page_user_lock_1.html">
									<i class="icon-lock"></i> Khóa màn hình </a>
							</li>
							<li>
								<a href="{{ url('logout') }}">
									<i class="icon-key"></i> Thoát </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN QUICK SIDEBAR TOGGLER -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-quick-sidebar-toggler">
						<a href="javascript:;" class="dropdown-toggle">
							<i class="icon-logout"></i>
						</a>
					</li>
					<!-- END QUICK SIDEBAR TOGGLER -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END HEADER INNER -->
	</div>
@show
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">

			<ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper hide">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler"> </div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search  " action="/manage" method="POST">
						<a href="javascript:;" class="remove">
							<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="nav-item start {{ active(['manage'],'active open') }} ">
					<a href="{{ route('manage') }}" class="nav-link nav-toggle">
						<i class="icon-home"></i>
						<span class="title">Home</span>
						<span class="selected"></span>
					</a>
				</li>


				<li class="nav-item  {{ active(['settings.index', 'admins.index'], 'active open') }}">
					<a href="{{ route('settings.index') }}" class="nav-link nav-toggle">
						<i class="icon-settings"></i>
						<span class="title">Cài đặt</span>
						<span class="arrow"></span>
						<span class="selected"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item">
							<a href="{{ route('settings.index') }}" class="nav-link ">
								<span class="title">Cài đặt thông tin website</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admins.index') }}" class="nav-link ">
								<span class="title">Quản trị tài khoản</span>
							</a>
						</li>

					</ul>
				</li>

				<li class="nav-item  ">
					<a href="javascript:;" class="nav-link nav-toggle">
						<i class="icon-pin"></i>
						<span class="title">Bài viết</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Tất cả bài viết</span>
							</a>
						</li>
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Bài viết mới</span>
							</a>
						</li>
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Chuyên mục</span>
							</a>
						</li>
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Thẻ</span>
							</a>
						</li>

					</ul>
				</li>
				<li class="nav-item  ">
					<a href="javascript:;" class="nav-link nav-toggle">
						<i class="icon-picture"></i>
						<span class="title">Hình ảnh</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Danh sách hình ảnh</span>
							</a>
						</li>
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Thêm mới hình ảnh</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item  ">
					<a href="javascript:;" class="nav-link nav-toggle">
						<i class="icon-docs"></i>
						<span class="title">Trang</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Tất cả các trang</span>
							</a>
						</li>
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Thêm mới trang</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="javascript:;" class="nav-link nav-toggle">
						<i class="icon-bubbles"></i>
						<span class="title">Bình luận</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="javascript:;" class="nav-link nav-toggle">
						<i class="icon-user"></i>
						<span class="title">Thành viên</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Tất cả thành viên</span>
							</a>
						</li>
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Thêm mới</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="javascript:;" class="nav-link nav-toggle">
						<i class="icon-envelope"></i>
						<span class="title">Email</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Email liên hệ</span>
							</a>
						</li>
						<li class="nav-item  ">
							<a href="form_controls.html" class="nav-link ">
								<span class="title">Email đăng ký theo dõi</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
	</div>
	<!-- END SIDEBAR -->

		@yield('content')

	<!-- BEGIN QUICK SIDEBAR -->
	<a href="javascript:;" class="page-quick-sidebar-toggler">
		<i class="icon-login"></i>
	</a>
	<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
		<div class="page-quick-sidebar">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
						<span class="badge badge-danger">2</span>
					</a>
				</li>
				<li>
					<a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
						<span class="badge badge-success">7</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-bell"></i> Alerts </a>
						</li>
						<li>
							<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-info"></i> Notifications </a>
						</li>
						<li>
							<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-speech"></i> Activities </a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-settings"></i> Settings </a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
					<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
						<h3 class="list-heading">Staff</h3>
						<ul class="media-list list-items">
							<li class="media">
								<div class="media-status">
									<span class="badge badge-success">8</span>
								</div>
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar3.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Bob Nilson</h4>
									<div class="media-heading-sub"> Project Manager </div>
								</div>
							</li>
							<li class="media">
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar1.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Nick Larson</h4>
									<div class="media-heading-sub"> Art Director </div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="badge badge-danger">3</span>
								</div>
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar4.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Deon Hubert</h4>
									<div class="media-heading-sub"> CTO </div>
								</div>
							</li>
							<li class="media">
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar2.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Ella Wong</h4>
									<div class="media-heading-sub"> CEO </div>
								</div>
							</li>
						</ul>
						<h3 class="list-heading">Customers</h3>
						<ul class="media-list list-items">
							<li class="media">
								<div class="media-status">
									<span class="badge badge-warning">2</span>
								</div>
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar6.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Lara Kunis</h4>
									<div class="media-heading-sub"> CEO, Loop Inc </div>
									<div class="media-heading-small"> Last seen 03:10 AM </div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="label label-sm label-success">new</span>
								</div>
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar7.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Ernie Kyllonen</h4>
									<div class="media-heading-sub"> Project Manager,
										<br> SmartBizz PTL </div>
								</div>
							</li>
							<li class="media">
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar8.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Lisa Stone</h4>
									<div class="media-heading-sub"> CTO, Keort Inc </div>
									<div class="media-heading-small"> Last seen 13:10 PM </div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="badge badge-success">7</span>
								</div>
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar9.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Deon Portalatin</h4>
									<div class="media-heading-sub"> CFO, H&D LTD </div>
								</div>
							</li>
							<li class="media">
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar10.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Irina Savikova</h4>
									<div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
								</div>
							</li>
							<li class="media">
								<div class="media-status">
									<span class="badge badge-danger">4</span>
								</div>
								<img class="media-object" src="{{asset('/manages/assets/layouts/layout/img/avatar11.jpg')}}" alt="...">
								<div class="media-body">
									<h4 class="media-heading">Maria Gomez</h4>
									<div class="media-heading-sub"> Manager, Infomatic Inc </div>
									<div class="media-heading-small"> Last seen 03:10 AM </div>
								</div>
							</li>
						</ul>
					</div>
					<div class="page-quick-sidebar-item">
						<div class="page-quick-sidebar-chat-user">
							<div class="page-quick-sidebar-nav">
								<a href="javascript:;" class="page-quick-sidebar-back-to-list">
									<i class="icon-arrow-left"></i>Back</a>
							</div>
							<div class="page-quick-sidebar-chat-user-messages">
								<div class="post out">
									<img class="avatar" alt="" src="{{asset('/manages/assets/layouts/layout/img/avatar3.jpg')}}" />
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:15</span>
										<span class="body"> When could you send me the report ? </span>
									</div>
								</div>
								<div class="post in">
									<img class="avatar" alt="" src="{{asset('/manages/assets/layouts/layout/img/avatar2.jpg')}}" />
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:15</span>
										<span class="body"> Its almost done. I will be sending it shortly </span>
									</div>
								</div>
								<div class="post out">
									<img class="avatar" alt="" src="{{asset('/manages/assets/layouts/layout/img/avatar3.jpg')}}" />
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:15</span>
										<span class="body"> Alright. Thanks! :) </span>
									</div>
								</div>
								<div class="post in">
									<img class="avatar" alt="" src="{{asset('/manages/assets/layouts/layout/img/avatar2.jpg')}}" />
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:16</span>
										<span class="body"> You are most welcome. Sorry for the delay. </span>
									</div>
								</div>
								<div class="post out">
									<img class="avatar" alt="" src="{{asset('/manages/assets/layouts/layout/img/avatar3.jpg')}}" />
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body"> No probs. Just take your time :) </span>
									</div>
								</div>
								<div class="post in">
									<img class="avatar" alt="" src="{{asset('/manages/assets/layouts/layout/img/avatar2.jpg')}}" />
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:40</span>
										<span class="body"> Alright. I just emailed it to you. </span>
									</div>
								</div>
								<div class="post out">
									<img class="avatar" alt="" src="{{asset('/manages/assets/layouts/layout/img/avatar3.jpg')}}" />
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body"> Great! Thanks. Will check it right away. </span>
									</div>
								</div>
								<div class="post in">
									<img class="avatar" alt="" src="{{asset('/manages/assets/layouts/layout/img/avatar2.jpg')}}" />
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Ella Wong</a>
										<span class="datetime">20:40</span>
										<span class="body"> Please let me know if you have any comment. </span>
									</div>
								</div>
								<div class="post out">
									<img class="avatar" alt="" src="{{asset('/manages/assets/layouts/layout/img/avatar3.jpg')}}" />
									<div class="message">
										<span class="arrow"></span>
										<a href="javascript:;" class="name">Bob Nilson</a>
										<span class="datetime">20:17</span>
										<span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
									</div>
								</div>
							</div>
							<div class="page-quick-sidebar-chat-user-form">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Type a message here...">
									<div class="input-group-btn">
										<button type="button" class="btn green">
											<i class="icon-paper-clip"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
					<div class="page-quick-sidebar-alerts-list">
						<h3 class="list-heading">General</h3>
						<ul class="feeds list-items">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 4 pending tasks.
												<span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> Just now </div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success">
													<i class="fa fa-bar-chart-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc"> Finance Report for year 2013 has been released. </div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date"> 20 mins </div>
									</div>
								</a>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 5 pending membership that requires a quick review. </div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 24 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> New order received with
												<span class="label label-sm label-success"> Reference Number: DR23923 </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 30 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 5 pending membership that requires a quick review. </div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 24 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-bell-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> Web server hardware needs to be upgraded.
												<span class="label label-sm label-warning"> Overdue </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 2 hours </div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-default">
													<i class="fa fa-briefcase"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc"> IPO Report for year 2013 has been released. </div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date"> 20 mins </div>
									</div>
								</a>
							</li>
						</ul>
						<h3 class="list-heading">System</h3>
						<ul class="feeds list-items">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 4 pending tasks.
												<span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> Just now </div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-danger">
													<i class="fa fa-bar-chart-o"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc"> Finance Report for year 2013 has been released. </div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date"> 20 mins </div>
									</div>
								</a>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-default">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 5 pending membership that requires a quick review. </div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 24 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> New order received with
												<span class="label label-sm label-success"> Reference Number: DR23923 </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 30 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> You have 5 pending membership that requires a quick review. </div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 24 mins </div>
								</div>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-warning">
												<i class="fa fa-bell-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> Web server hardware needs to be upgraded.
												<span class="label label-sm label-default "> Overdue </span>
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date"> 2 hours </div>
								</div>
							</li>
							<li>
								<a href="javascript:;">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-info">
													<i class="fa fa-briefcase"></i>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc"> IPO Report for year 2013 has been released. </div>
											</div>
										</div>
									</div>
									<div class="col2">
										<div class="date"> 20 mins </div>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
					<div class="page-quick-sidebar-settings-list">
						<h3 class="list-heading">General Settings</h3>
						<ul class="list-items borderless">
							<li> Enable Notifications
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Allow Tracking
								<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Log Errors
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Auto Sumbit Issues
								<input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Enable SMS Alerts
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
						</ul>
						<h3 class="list-heading">System Settings</h3>
						<ul class="list-items borderless">
							<li> Security Level
								<select class="form-control input-inline input-sm input-small">
									<option value="1">Normal</option>
									<option value="2" selected>Medium</option>
									<option value="e">High</option>
								</select>
							</li>
							<li> Failed Email Attempts
								<input class="form-control input-inline input-sm input-small" value="5" /> </li>
							<li> Secondary SMTP Port
								<input class="form-control input-inline input-sm input-small" value="3560" /> </li>
							<li> Notify On System Error
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
							<li> Notify On SMTP Error
								<input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
						</ul>
						<div class="inner-content">
							<button class="btn btn-success">
								<i class="icon-settings"></i> Save Changes</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner text-center"> 2017 &copy; Custom theme by NguyenHiep. </div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->

@section('scripts')
<!--[if lt IE 9]>
<script src="{{asset('/manages/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('/manages/assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('/manages/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/uniform/jquery.uniform.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"
		type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('/manages/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/counterup/jquery.waypoints.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/counterup/jquery.counterup.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/amcharts/amcharts.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/amcharts/serial.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/amcharts/radar.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/amcharts/themes/light.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/amcharts/amstockcharts/amstock.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.resize.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.categories.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}"
		type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}"
		type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('/manages/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('/manages/assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('/manages/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/layouts/global/scripts/quick-sidebar.min.js')}}"
		type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
@show
</body>

</html>