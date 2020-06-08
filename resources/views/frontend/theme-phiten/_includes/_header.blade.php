<span class="menu-btn overlay"> </span>
<div id="toppanel">
    <div class="container clearfix">
        @if(!empty($settings) && !empty($settings->company_tel))
        <a href="tel:{{ $settings->company_tel }}" class="u-phone1">
            <p class="text1"> Tổng đài tư vấn và mua hàng : </p>
            <p class="phone1"><i class="icon-phone-3"></i>{{ $settings->company_tel }}</p>
        </a>
        @endif
        <div class="group-right">
            <div class="item">
                <form action="{{ route('search.index') }}" method="GET" class="form-search-focus">
                    <input name="q" type="text" placeholder="Tìm kiếm sản phẩm..."/>
                    <button><i class="icon-search-2"></i></button>
                </form>
            </div>
                <div class="item">
                    @guest
                        <a href="#" data-toggle="modal" data-target="#myLogin">Đăng Nhập</a>
                    @endguest
                    @auth
                        <a href="{{ route('customer.dashboard') }}">
                            <img src="{{ asset('theme-phiten/assets/images/svg/user.svg') }}" alt="user icon"/>
                            {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                        </a>
                    @endauth
                </div>
        </div>
    </div>
</div>

<header id="header" class="fixe" role="banner">
    <div class="container">
        @if(!empty($settings) && !empty($settings->company_logo) && !empty($settings->params['enable_show_logo_site']))
            <a href="{{ route('home') }}" id="logo"> <img src="{{ asset(UPLOAD_SETTING . $settings->company_logo) }}" alt="{{ $settings->subtitle }}"></a>
        @endif
        <div class="wrap-menu-header "> <!--Detect only show PC-->
            <ul class="menu-top-header">
                @includeIf('frontend.theme-phiten._includes._mainmenu')
            </ul>
        </div>
        @if(!request()->routeIs('checkout.cart.index'))
        <div class="group-header">
            <div class="item widget-mini-cart toggleClass">
                <span class="toggle">
                    <img src="{{ asset('theme-phiten/assets/images/svg/shopping-cart-black.svg') }}" alt="shopping-cart" width="24px"/>
                    <span class="qty cart-count">@{{ listItemCart.length }}</span>
                </span>
                <div class="toggle-content">
                    @includeIf('frontend.theme-phiten._modules.mini-cart')
                </div>
            </div>
        </div>
        @endif
        <span class="menu-btn x"><span></span></span>
    </div>
</header>

<!-- End Mainmenu -->

<div class="wrap-menu-mb" data-style="1">
    <div class="wrapul main">
        <div class="menu-head">
            <h3>Main menu</h3>
            <span class="menu-btn x"><span></span></span>
        </div>
        <div class="inner">
            <ul class="menu">
                @includeIf('frontend.theme-phiten._includes._mainmenu')
            </ul>
        </div>
    </div>
</div>
