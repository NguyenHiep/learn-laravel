<span class="menu-btn overlay"> </span>
<div id="toppanel">
    <div class="container clearfix">
        @if(!empty($settings))
        <div class="group-left">
            <div class="item ilang">
                <div class="dropdown language">
                    <div class="title"> Ngôn ngữ : <span>VI</span></div>
                    <div class="content">
                        <div class="inner">
                            <ul class="menu">
                                <li class="lang-en">
                                    <a href="#" hreflang="en" title="English (en)">
                                        <img src="//via.placeholder.com/20x20" alt=""/> <span>English</span>
                                    </a>
                                </li>
                                <li class="lang-vi active">
                                    <a href="#" hreflang="vi" title="Tiếng Việt (vi)">
                                        <img src="//via.placeholder.com/20x20" alt=""/> <span>Tiếng Việt</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            <div class="item ">
                <a href="#" data-toggle="modal" data-target="#myLogin">Đăng Nhập</a>
            </div>

            <div class="item widget-mini-cart toggleClass">
                <span class="toggle"><img src="{{ asset('theme-phiten/assets/images/svg/cart.svg') }}" alt=""/> </span>
                <div class="toggle-content">
                    @includeIf('frontend.theme-phiten._modules.mini-cart')
                </div>
            </div>
        </div>
    </div>
</div>

<header id="header" class="fixe" role="banner">
    <div class="container">
        @if(!empty($settings) && !empty($settings->company_logo))
            <a href="{{ route('home') }}" id="logo"> <img src="{{ asset(UPLOAD_SETTING.$settings->company_logo) }}" alt="{{ $settings->subtitle }}"></a>
        @endif
        <div class="wrap-menu-header "> <!--Detect only show PC-->
            <ul class="menu-top-header">
                @includeIf('frontend.theme-phiten._includes.mainmenu')
            </ul>
        </div>
        <div class="group-header">
            <div class="item widget-mini-cart toggleClass">
                <span class="toggle"><img src="{{ asset('theme-phiten/assets/images/svg/cart4.svg') }}" alt=""/> </span>
                <div class="toggle-content">
                    @includeIf('frontend.theme-phiten._modules.mini-cart')
                </div>
            </div>

        </div>
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
                @includeIf('frontend.theme-phiten._includes.mainmenu')
            </ul>
            @if(!empty($settings))
            <div class="language">
                <ul class="row">
                    <li class="lang-en col-sm-6 col-xs-6">
                        <a href="#" hreflang="en" title="English (en)">
                            <img src="//via.placeholder.com/20x20" alt=""/> <span>English</span>
                        </a>
                    </li>
                    <li class="lang-vi active  col-sm-6 col-xs-6">
                        <a href="#" hreflang="vi" title="Tiếng Việt (vi)">
                            <img src="//via.placeholder.com/20x20" alt=""/> <span>Tiếng Việt</span>
                        </a>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
