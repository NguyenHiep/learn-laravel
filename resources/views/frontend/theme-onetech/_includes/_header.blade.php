<!-- Header -->
<header class="header">

    <!-- Top Bar -->
    <div class="top_bar">
      <div class="container">
        <div class="row">
          <div class="col d-flex flex-row">
            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('theme-onetech/images/phone.png') }}" alt=""></div>{{ $settings->company_tel ??  $settings->company_fax}}</div>
            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('theme-onetech/images/mail.png') }}" alt=""></div><a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email }}</a></div>
            <div class="top_bar_content ml-auto">
              <div class="top_bar_menu">
                <ul class="standard_dropdown top_bar_dropdown">
                  <li>
                    <a href="#">Tiếng việt<i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li><a href="#">English</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">VNĐ<i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li><a href="#">$ US dollar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="top_bar_user">
                <div class="user_icon"><img src="{{ asset('theme-onetech/images/user.svg') }}" alt=""></div>
                <div><a href="#">{{__('frontend.header.register')}}</a></div>
                <div><a href="#">{{__('frontend.header.sign_in')}}</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
      <div class="container">
        <div class="row">

          <!-- Logo -->
          <div class="col-lg-2 col-sm-3 col-3 order-1">
            <div class="logo_container">
              <div class="logo"><a href="{{ route('home') }}">{{$settings->company_name}}</a></div>
            </div>
          </div>

          <!-- Search -->
          <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
            <div class="header_search">
              <div class="header_search_content">
                <div class="header_search_form_container">
                  <form action="#" class="header_search_form clearfix">
                    <input type="search" required="required" class="header_search_input" placeholder="{{__('frontend.header.input_search')}}">
                    <div class="custom_dropdown">
                      <div class="custom_dropdown_list">
                        <span class="custom_dropdown_placeholder clc">{{__('frontend.header.categories')}}</span>
                        <i class="fas fa-chevron-down"></i>
                        <ul class="custom_list clc">
                          <li><a class="clc" href="#">{{__('frontend.header.categories')}}</a></li>
                          @isset($categories)
                            @foreach ($categories as $category)
                              <li><a class="clc" href="{{ route('category.show', $category->slug) }}">{{$category->name}}</a></li>
                            @endforeach
                          @endisset
                        </ul>
                      </div>
                    </div>
                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('theme-onetech/images/search.png') }}" alt="search"></button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Wishlist -->
          <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
              <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                <div class="wishlist_icon"><img src="{{ asset('theme-onetech/images/heart.png') }}" alt=""></div>
                <div class="wishlist_content">
                  <div class="wishlist_text"><a href="#">{{__('frontend.header.wishlist')}}</a></div>
                  <div class="wishlist_count">115</div>
                </div>
              </div>

              <!-- Cart -->
              <div class="cart">
                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                  <div class="cart_icon">
                    <img src="{{ asset('theme-onetech/images/cart.png') }}" alt="">
                    <div class="cart_count"><span>10</span></div>
                  </div>
                  <div class="cart_content">
                    <div class="cart_text"><a href="#">{{__('frontend.header.cart')}}</a></div>
                    <div class="cart_price">1.500.000 Đ</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
      <div class="container">
        <div class="row">
          <div class="col">

            <div class="main_nav_content d-flex flex-row">

              <!-- Categories Menu -->

              <div class="cat_menu_container">
                <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                  <div class="cat_burger"><span></span><span></span><span></span></div>
                  <div class="cat_menu_text">{{__('frontend.header.categories')}}</div>
                </div>
                @isset($categories)
                <ul class="cat_menu">
                  @foreach($categories as $category)
                    @if($category->parent_id === 0)
                      <li><a href="{{ route('category.show', $category->slug) }}" title="{{ $category->name }}">{{ $category->name }} <i class="fas fa-chevron-right ml-auto"></i></a></li>
                    @endif
                  @endforeach
                </ul>
                @endisset
              </div>

              <!-- Main Nav Menu -->

              <div class="main_nav_menu ml-auto">
                <ul class="standard_dropdown main_nav_dropdown">
                  <li><a href="{{ url('/') }}">Sản phẩm<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="{{ url('san-pham-khuyen-mai') }}">Khuyến mãi<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="{{ url('gioi-thieu') }}">Giới thiệu<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="{{ url('tin-tuc') }}">Tin tức<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="{{ url('huong-dan-thanh-toan') }}">Hướng dẫn thanh toán<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="{{ url('lien-he') }}">Liên hệ<i class="fas fa-chevron-down"></i></a></li>
                </ul>
              </div>

              <!-- Menu Trigger -->

              <div class="menu_trigger_container ml-auto">
                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                  <div class="menu_burger">
                    <div class="menu_trigger_text">menu</div>
                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Menu -->

    <div class="page_menu">
      <div class="container">
        <div class="row">
          <div class="col">

            <div class="page_menu_content">

              <div class="page_menu_search">
                <form action="#">
                  <input type="search" required="required" class="page_menu_search_input" placeholder="{{__('frontend.header.input_search')}}">
                </form>
              </div>
              <ul class="page_menu_nav">
                <li class="page_menu_item has-children">
                  <a href="#">Ngôn ngữ<i class="fa fa-angle-down"></i></a>
                  <ul class="page_menu_selection">
                    <li><a href="#">Tiếng việt<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                  </ul>
                </li>
                <li class="page_menu_item has-children">
                  <a href="#">Tiền tệ<i class="fa fa-angle-down"></i></a>
                  <ul class="page_menu_selection">
                    <li><a href="#">VNĐ<i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                  </ul>
                </li>
                <li class="page_menu_item">
                  <a href="{{ url('/') }}">Sản phẩm<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item">
                  <a href="{{ url('san-pham-khuyen-mai') }}">Khuyến mãi<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item">
                  <a href="{{ url('gioi-thieu') }}">Giới thiệu<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item">
                  <a href="{{ url('tin-tuc') }}">Tin tức<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item"><a href="{{ url('huong-dan-thanh-toan') }}">Hướng dẫn thanh toán<i class="fa fa-angle-down"></i></a></li>
                <li class="page_menu_item"><a href="{{ url('lien-he') }}">Liên hệ<i class="fa fa-angle-down"></i></a></li>
              </ul>

              <div class="menu_contact">
                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('theme-onetech/images/phone_white.png') }}" alt=""></div>{{ $settings->company_tel ??  $settings->company_fax}}</div>
                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('theme-onetech/images/mail_white.png') }}" alt=""></div><a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email }}</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>