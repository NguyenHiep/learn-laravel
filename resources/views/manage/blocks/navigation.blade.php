<!-- BEGIN HEADER -->
@section('navigation_top')
  <div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
      <!-- BEGIN LOGO -->
      <div class="page-logo">
        <a href="{{ route('manage.dashboard') }}">
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
              <img alt="" class="img-circle" src="{{Storage::url(auth('user')->user()->avatar)}}"/>
              <span class="username username-hide-on-mobile">{{ auth('user')->user()->username }}</span>
              <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
              <li>
                <a href="{{ route('manage.admins.edit',['admin' => auth('user')->id()]) }}">
                  <i class="icon-user"></i> Thông tin tài khoản </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="javascript:void(0)"
               onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();"
               class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
            <form id="user-logout-form" action="{{ route('manage.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
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