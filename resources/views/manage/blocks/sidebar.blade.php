<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false"
        data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
      <li class="sidebar-toggler-wrapper hide">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler"></div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
      </li>
      <li class="sidebar-search-wrapper">
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
      </li>
      <li class="nav-item start {{ active(['manage'],'active open') }} ">
        <a href="{{ route('manage') }}" class="nav-link nav-toggle">
          <i class="icon-home"></i>
          <span class="title">{{__('static.sidebars.manage.manage')}}</span>
          <span class="selected"></span>
        </a>
      </li>

      <li class="nav-item  {{ active(['categories.index', 'categories.create', 'categories.edit'], 'active open') }}">
        <a href="{{ route('categories.index') }}" class="nav-link ">
          <i class="fa fa-tasks"></i>
          <span class="title">{{__('static.sidebars.manage.categories.title')}}</span>
        </a>
      </li>

      <li
        class="nav-item  {{ active(['products.index', 'products.create', 'products.edit'], 'active open') }}">
        <a href="{{ route('products.index') }}" class="nav-link nav-toggle">
          <i class="icon-graph"></i>
          <span class="title">{{__('static.sidebars.manage.products.title')}}</span>
          <span class="arrow {{ active(['products.index', 'products.create', 'products.edit'], 'open') }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item">
            <a href="{{ route('products.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.products.create')}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.products.list')}}</span>
            </a>
          </li>

        </ul>
      </li>

      <li
        class="nav-item  {{ active(['orders.index', 'orders.create', 'orders.edit', 'orders.invoice', 'orders.show'], 'active open') }}">
        <a href="{{ route('orders.index') }}" class="nav-link nav-toggle">
          <i class="icon-basket"></i>
          <span class="title">{{__('static.sidebars.manage.orders.title')}}</span>
        </a>
    {{--    <ul class="sub-menu">

          <li class="nav-item">
            <a href="{{ route('orders.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.orders.list')}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('orders.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.orders.create')}}</span>
            </a>
          </li>

        </ul>--}}
      </li>

      <li class="nav-item  {{ active(['posts.index', 'posts.create', 'posts.edit', 'category.index', 'category.create','category.edit', 'tags.index', 'tags.create', 'tags.edit'], 'active open') }}">
        <a href="{{ route('posts.index') }}" class="nav-link nav-toggle">
          <i class="icon-pin"></i>
          <span class="title">{{__('static.sidebars.manage.posts.title')}}</span>
          <span class="arrow {{ active(['posts.index'], 'open') }}"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item  ">
            <a href="{{ route('posts.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.posts.posts')}}</span>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="{{ route('posts.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.posts.creates')}}</span>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="{{ route('category.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.posts.category')}}</span>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="{{ route('tags.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.posts.tags')}}</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item  {{ active(['medias.index', 'medias.create', 'medias.edit'], 'active open') }}">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-picture"></i>
          <span class="title">{{__('static.sidebars.manage.medias.title')}}</span>
          <span class="arrow {{ active(['medias.index', 'medias.create', 'medias.edit'], 'open') }}"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item  ">
            <a href="{{ route('medias.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.medias.medias')}}</span>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="{{ route('medias.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.medias.creates')}}</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item  {{ active(['pages.index', 'pages.create', 'pages.edit'], 'active open') }}">
        <a href="{{ route('pages.index') }}" class="nav-link nav-toggle">
          <i class="icon-docs"></i>
          <span class="title">{{__('static.sidebars.manage.pages.title')}}</span>
          <span class="arrow {{ active(['pages.index', 'pages.create', 'pages.edit'], 'open') }}"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item  ">
            <a href="{{ route('pages.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.pages.pages')}}</span>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="{{ route('pages.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.pages.creates')}}</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{ route('comments.index') }}" class="nav-link nav-toggle">
          <i class="icon-bubbles"></i>
          <span class="title">{{__('static.sidebars.manage.comments')}}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('customers.index') }}" class="nav-link nav-toggle">
          <i class="icon-user"></i>
          <span class="title">{{__('static.sidebars.manage.customers.title')}}</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item  ">
            <a href="{{ route('customers.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.customers.customers')}}</span>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="{{ route('customers.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.customers.creates')}}</span>
            </a>
          </li>
        </ul>
      </li>
      {{--<li class="nav-item">
        <a href="{{ route('email.index') }}" class="nav-link nav-toggle">
          <i class="icon-envelope"></i>
          <span class="title">{{__('static.sidebars.manage.email.title')}}</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item  ">
            <a href="{{ route('email.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.email.contact')}}</span>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="{{ route('email.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.email.subscribe')}}</span>
            </a>
          </li>
        </ul>
      </li>--}}
      <li
        class="nav-item  {{ active(['settings.index', 'admins.index', 'admins.create', 'admins.edit'], 'active open') }}">
        <a href="{{ route('settings.index') }}" class="nav-link nav-toggle">
          <i class="icon-settings"></i>
          <span class="title">{{__('static.sidebars.manage.settings.title')}}</span>
          <span class="arrow {{ active(['settings.index', 'admins.index', 'admins.create', 'admins.edit'], 'open') }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.settings.settings')}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admins.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.settings.admins')}}</span>
            </a>
          </li>

        </ul>
      </li>
    </ul>
  </div>
</div>
<!-- END SIDEBAR -->