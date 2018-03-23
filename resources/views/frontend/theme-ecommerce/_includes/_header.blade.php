@if(!empty($settings))
<!-- Header - start -->
<header class="header">
  
  <!-- Topbar - start -->
  <div class="header_top">
    <div class="container">
      <ul class="contactinfo nav nav-pills">
        <li>
          <i class='fa fa-phone'></i> {{ $settings->company_tel }}
        </li>
        <li>
          <i class="fa fa-envelope"></i> {{ $settings->company_email }}
        </li>
      </ul>
      @php
        $socials = [
          [
              'icon' => '<i class="fa fa-facebook"></i>',
              'url'  => $settings->company_facebook
          ],
          [
              'icon' => ' <i class="fa fa-google-plus"></i>',
              'url'  => $settings->company_googleplus
          ],
          [
              'icon' => '<i class="fa fa-twitter"></i>',
              'url'  => $settings->company_twitter
          ],
          [
              'icon' => '<i class="fa fa-vk"></i>',
              'url'  => $settings->company_vk
          ],
          [
              'icon' => '<i class="fa fa-instagram"></i>',
              'url'  => $settings->company_instagram
          ],
      ]
      @endphp
      <!-- Social links -->
      <ul class="social-icons nav navbar-nav">
        @foreach($socials as $social)
          @if(!empty($social['url']))
            <li>
              <a href="{{ $social['url'] }}" rel="nofollow" target="_blank">{!! $social['icon'] !!} </a>
            </li>
          @endif
        @endforeach
      </ul>
    </div>
  </div>
  <!-- Topbar - end -->
  
  <!-- Logo, Shop-menu - start -->
  <div class="header-middle">
    <div class="container header-middle-cont">
      <div class="toplogo">
        @if(!empty($settings->company_logo))
        <a href="{{ URL::to('/') }}">
          <img src="{{ asset(UPLOAD_SETTING.$settings->company_logo) }}" alt="{{ $settings->subtitle }}">
        </a>
        @endif
      </div>
      <div class="shop-menu">
        <ul>
          
        <li>
            <a href="wishlist.html">
              <i class="fa fa-heart"></i>
              <span class="shop-menu-ttl">Yêu thích</span>
              (<span id="topbar-favorites">1</span>)
            </a>
          </li>
          
          <li>
            <a href="{{ route('compare.index') }}">
              <i class="fa fa-bar-chart"></i>
              @php
                $compare_item = 0;
                if(Session::has(SESSION_ITEMS_COMPARE)){
                  $compare_item =  count(Session::get(SESSION_ITEMS_COMPARE));
                }
              @endphp
              <span class="shop-menu-ttl">So sánh</span> (<span id="total_compare">{{ $compare_item }}</span>)
            </a>
          </li>
          
          <li class="topauth">
            <a href="auth.html">
              <i class="fa fa-lock"></i>
              <span class="shop-menu-ttl">Đăng ký</span>
            </a>
            <a href="auth.html">
              <span class="shop-menu-ttl">Đăng nhập</span>
            </a>
          </li>
          
          <li>
            <div class="h-cart">
              <a href="{{ route('checkout.cart.index') }}">
                <i class="fa fa-shopping-cart"></i>
                @php
                  $cart_item = 0;
                  if(Session::has(SESSION_ITEMS_CART)){
                    $cart_item =  count(Session::get(SESSION_ITEMS_CART));
                  }
                @endphp
                <span class="shop-menu-ttl">Giỏ hàng</span>
                (<b><span id="total_cart">{{ $cart_item }}</span></b>)
              </a>
            </div>
          </li>
        
        </ul>
      </div>
    </div>
  </div>
  <!-- Logo, Shop-menu - end -->
  
  <!-- Topmenu - start -->
  <div class="header-bottom">
    <div class="container">
      <nav class="topmenu">
        
        <!-- Catalog menu - start -->
        <div class="topcatalog">
          <a class="topcatalog-btn" href="javascript:void(0)"><span>Tất cả </span>danh mục</a>
          @if(count($categories) > 0)
          <ul class="topcatalog-list">
            @foreach($categories as $category)
              @if($category->parent_id === 0)
                <li>
                  <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                    <i class="fa fa-angle-right"></i>
                    <ul>
                      @foreach($categories as $sub_category_lv1)
                        @if($sub_category_lv1->parent_id === $category->id)
                          <li>
                            <a href="{{ route('category.show', $sub_category_lv1->slug) }}">
                              {{ $sub_category_lv1->name }}
                            </a>
                          </li>
                        @endif
                      @endforeach
                    </ul>
                    
                </li>
              @endif
             @endforeach
          </ul>
          @endif
        </div>
        <!-- Catalog menu - end -->
        
        <!-- Main menu - start -->
        <button type="button" class="mainmenu-btn">Menu</button>
        
        <ul class="mainmenu">
          <li><a href="{{ url('/') }}" class="active">Sản phẩm</a></li>
          <li><a href="{{ route('product.promotion') }}">Khuyến mãi</a></li>
          <li><a href="{{ url('gioi-thieu') }}">Giới thiệu</a></li>
          <li><a href="{{ url('tin-tuc') }}">Tin tức</a></li>
          <li><a href="{{ url('huong-dan-thanh-toan') }}">Hướng dẫn thanh toán</a></li>
          <li><a href="{{ url('lien-he') }}">Liên hệ</a></li>
          <li class="mainmenu-more">
            <span>...</span>
            <ul class="mainmenu-sub"></ul>
          </li>
        </ul>
        <!-- Main menu - end -->
        
        <!-- Search - start -->
        <div class="topsearch">
          <a id="topsearch-btn" class="topsearch-btn" href="#"><i class="fa fa-search"></i></a>
          <form class="topsearch-form" action="#">
            <input type="text" placeholder="Nhập tên hoặc mã sku của sản phẩm">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- Search - end -->
      
      </nav>
    </div>
  </div>
  <!-- Topmenu - end -->

</header>
<!-- Header - end -->
@endif
