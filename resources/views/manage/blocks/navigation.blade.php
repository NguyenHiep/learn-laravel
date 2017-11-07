<!-- BEGIN HEADER -->
@section('navigation_top')
  <div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
      <!-- BEGIN LOGO -->
      <div class="page-logo">
        <a href="index.html">
          <img src="{{asset('/manages/assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default"/> </a>
        <div class="menu-toggler sidebar-toggler"></div>
      </div>
      <!-- END LOGO -->
      <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
         data-target=".navbar-collapse"> </a>
      <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown dropdown-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
               data-close-others="true">
              <img alt="" class="img-circle" src="{{asset('/manages/assets/layouts/layout/img/avatar3_small.jpg')}}"/>
              <span class="username username-hide-on-mobile"> Nguyễn Hiệp </span>
              <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
              <li>
                <a href="/">
                  <i class="icon-user"></i> Thông tin tài khoản </a>
              </li>
              <li>
                <a href="{{ url('logout') }}">
                  <i class="icon-logout"></i> Thoát </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="{{ url('logout') }}" class="dropdown-toggle">
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