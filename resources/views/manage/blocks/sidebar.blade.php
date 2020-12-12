<!-- BEGIN SIDEBAR -->
@if(Auth::guard('user')->check())
<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false"
        data-auto-scroll="true" data-slide-speed="200">
      <li class="sidebar-toggler-wrapper hide">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler"></div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
      </li>
      @can('dashboard-list')
      <li class="nav-item start {{ active(['manage.dashboard'],'active open') }} ">
        <a href="{{ route('manage.dashboard') }}" class="nav-link nav-toggle">
          <i class="icon-home"></i>
          <span class="title">{{__('static.sidebars.manage.manage')}}</span>
          <span class="selected"></span>
        </a>
      </li>
      @endcan
      @canany(['product-list', 'product-create', 'category-list'])
      <li class="nav-item  {{ active([
    'manage.products.index', 'manage.products.create', 'manage.products.edit',
    'manage.categories.index', 'manage.categories.create', 'manage.categories.edit'
    ], 'active open') }}">
        <a href="{{ route('manage.products.index') }}" class="nav-link nav-toggle">
          <i class="icon-graph"></i>
          <span class="title">{{__('static.sidebars.manage.products.title')}}</span>
          <span class="arrow {{ active(['manage.products.index', 'manage.products.create', 'manage.products.edit'], 'open') }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          @can('product-list')
          <li class="nav-item">
            <a href="{{ route('manage.products.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.products.list')}}</span>
            </a>
          </li>
          @endcan
          @can('product-create')
          <li class="nav-item">
            <a href="{{ route('manage.products.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.products.create')}}</span>
            </a>
          </li>
          @endcan
          @can('category-list')
          <li class="nav-item">
            <a href="{{ route('manage.categories.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.categories.title')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcanany
      @canany(['order-list', 'order-create'])
      <li
        class="nav-item  {{ active(['manage.orders.index', 'manage.orders.create', 'manage.orders.edit', 'manage.orders.invoice', 'manage.orders.show'], 'active open') }}">
        <a href="{{ route('manage.orders.index') }}" class="nav-link nav-toggle">
          <i class="icon-basket"></i>
          <span class="title">{{__('static.sidebars.manage.orders.title')}}</span>
        </a>
        <ul class="sub-menu">
          @can('order-list')
          <li class="nav-item">
            <a href="{{ route('manage.orders.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.orders.list')}}</span>
            </a>
          </li>
          @endcan
          @can('order-create')
          <li class="nav-item">
            <a href="{{ route('manage.orders.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.orders.create')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcanany
      @canany(['post-list', 'post-create', 'post-category-list', 'post-tag-list'])
      <li class="nav-item {{ active(['manage.posts.index', 'manage.posts.create', 'manage.posts.edit', 'manage.category.index', 'manage.category.create','manage.category.edit', 'manage.tags.index', 'manage.tags.create', 'manage.tags.edit'], 'active open') }}">
        <a href="{{ route('manage.posts.index') }}" class="nav-link nav-toggle">
          <i class="icon-pin"></i>
          <span class="title">{{__('static.sidebars.manage.posts.title')}}</span>
          <span class="arrow {{ active(['manage.posts.index'], 'open') }}"></span>
        </a>
        <ul class="sub-menu">
          @can('post-list')
          <li class="nav-item">
            <a href="{{ route('manage.posts.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.posts.posts')}}</span>
            </a>
          </li>
          @endcan
          @can('post-create')
          <li class="nav-item">
            <a href="{{ route('manage.posts.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.posts.creates')}}</span>
            </a>
          </li>
          @endcan
          @can('post-category-list')
          <li class="nav-item">
            <a href="{{ route('manage.category.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.posts.category')}}</span>
            </a>
          </li>
          @endcan
          @can('post-tag-list')
          <li class="nav-item  ">
            <a href="{{ route('manage.tags.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.posts.tags')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcanany
      @canany(['media-list', 'media-create'])
      <li class="nav-item {{ active(['manage.medias.index', 'manage.medias.create', 'manage.medias.edit'], 'active open') }}">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-picture"></i>
          <span class="title">{{__('static.sidebars.manage.medias.title')}}</span>
          <span class="arrow {{ active(['manage.medias.index', 'manage.medias.create', 'manage.medias.edit'], 'open') }}"></span>
        </a>
        <ul class="sub-menu">
          @can('media-list')
          <li class="nav-item">
            <a href="{{ route('manage.medias.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.medias.medias')}}</span>
            </a>
          </li>
          @endcan
          @can('media-create')
          <li class="nav-item">
            <a href="{{ route('manage.medias.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.medias.creates')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcanany
      @canany(['slider-list', 'slider-create'])
      <li class="nav-item  {{ active(['manage.sliders.index', 'manage.sliders.create', 'manage.sliders.edit'], 'active open') }}">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-picture"></i>
          <span class="title">{{__('static.sidebars.manage.sliders.title')}}</span>
          <span class="arrow {{ active(['manage.sliders.index', 'manage.sliders.create', 'manage.sliders.edit'], 'open') }}"></span>
        </a>
        <ul class="sub-menu">
          @can('slider-list')
          <li class="nav-item">
            <a href="{{ route('manage.sliders.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.sliders.sliders')}}</span>
            </a>
          </li>
          @endcan
          @can('slider-create')
          <li class="nav-item">
            <a href="{{ route('manage.sliders.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.sliders.creates')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcanany
      @canany(['page-list', 'page-create'])
      <li class="nav-item {{ active(['manage.pages.index', 'manage.pages.create', 'manage.pages.edit'], 'active open') }}">
        <a href="{{ route('manage.pages.index') }}" class="nav-link nav-toggle">
          <i class="icon-docs"></i>
          <span class="title">{{__('static.sidebars.manage.pages.title')}}</span>
          <span class="arrow {{ active(['manage.pages.index', 'manage.pages.create', 'manage.pages.edit'], 'open') }}"></span>
        </a>
        <ul class="sub-menu">
          @can('page-list')
          <li class="nav-item">
            <a href="{{ route('manage.pages.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.pages.pages')}}</span>
            </a>
          </li>
          @endcan
          @can('page-create')
          <li class="nav-item">
            <a href="{{ route('manage.pages.create') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.pages.creates')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcanany
      @can('comment-list')
      <li class="nav-item">
        <a href="{{ route('manage.comments.index') }}" class="nav-link nav-toggle">
          <i class="icon-bubbles"></i>
          <span class="title">{{__('static.sidebars.manage.comments')}}</span>
        </a>
      </li>
      @endcan
      @canany(['customer-list', 'user-list', 'role-list'])
      <li class="nav-item {{ active([
    'manage.customers.index', 'manage.customers.create', 'manage.customers.edit',
    'manage.admins.index', 'manage.admins.create', 'manage.admins.edit',
    'manage.roles.index', 'manage.roles.create', 'manage.roles.edit'
    ], 'active open') }}">
        <a href="{{ route('manage.customers.index') }}" class="nav-link nav-toggle">
          <i class="icon-user"></i>
          <span class="title">{{__('static.sidebars.manage.customers.title')}}</span>
          <span class="arrow" {{ active([
    'manage.customers.index', 'manage.customers.create', 'manage.customers.edit',
    'manage.admins.index', 'manage.admins.create', 'manage.admins.edit',
    'manage.roles.index', 'manage.roles.create', 'manage.roles.edit'
    ], 'open') }}>
          </span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          @can('customer-list')
          <li class="nav-item">
            <a href="{{ route('manage.customers.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.customers.customers')}}</span>
            </a>
          </li>
          @endcan
          @can('user-list')
          <li class="nav-item">
            <a href="{{ route('manage.admins.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.customers.admins')}}</span>
            </a>
          </li>
          @endcan
          @can('role-list')
          <li class="nav-item  ">
            <a href="{{ route('manage.roles.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.customers.roles')}}</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcanany
      @can('email-list')
      <li class="nav-item {{ active(['manage.email.index'], 'active open') }}">
        <a href="{{ route('manage.email.index') }}" class="nav-link nav-toggle">
          <i class="icon-envelope"></i>
          <span class="title">{{__('static.sidebars.manage.email.title')}}</span>
          <span class="arrow {{ active(['manage.email.index'], 'open') }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item">
            <a href="{{ route('manage.email.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.email.contact')}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('manage.email.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.email.subscribe')}}</span>
            </a>
          </li>
        </ul>
      </li>
      @endcan
      @can('setting-list')
      <li
        class="nav-item  {{ active(['manage.settings.index', 'manage.settings.theme_options'], 'active open') }}">
        <a href="{{ route('manage.settings.index') }}" class="nav-link nav-toggle">
          <i class="icon-settings"></i>
          <span class="title">{{__('static.sidebars.manage.settings.title')}}</span>
          <span class="arrow {{ active(['manage.settings.index', 'manage.settings.theme_options'], 'open') }}"></span>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item">
            <a href="{{ route('manage.settings.theme_options') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.settings.theme_options')}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('manage.settings.index') }}" class="nav-link ">
              <span class="title">{{__('static.sidebars.manage.settings.settings')}}</span>
            </a>
          </li>
        </ul>
      </li>
      @endcan
    </ul>
  </div>
</div>
@endif
<!-- END SIDEBAR -->