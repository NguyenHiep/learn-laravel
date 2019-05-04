@if(!empty($settings))
<header class="header">
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
  <div class="header-bottom">
    <div class="container">
      <nav class="topmenu">
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
        <button type="button" class="mainmenu-btn">Menu</button>
        <ul class="mainmenu">
          <li><a href="{{ url('/') }}" class="{{ url()->current() == url('/') ? 'active' : '' }}">Sản phẩm</a></li>
          <li><a href="{{ route('product.promotion') }}" class="{{ url()->current() == route('product.promotion') ? 'active' : '' }}">Khuyến mãi</a></li>
          <li><a href="{{ url('gioi-thieu') }}" class="{{ url()->current() == url('gioi-thieu') ? 'active' : '' }}">Giới thiệu</a></li>
          <li><a href="{{ url('tin-tuc') }}" class="{{ url()->current() == url('tin-tuc') ? 'active' : '' }}">Tin tức</a></li>
          <li><a href="{{ url('huong-dan-thanh-toan') }}" class="{{ url()->current() == url('huong-dan-thanh-toan') ? 'active' : '' }}">Hướng dẫn thanh toán</a></li>
          <li><a href="{{ url('lien-he') }}" class="{{ url()->current() == url('lien-he') ? 'active' : '' }}">Liên hệ</a></li>
          <li class="mainmenu-more">
            <span>...</span>
            <ul class="mainmenu-sub"></ul>
          </li>
        </ul>
        <div class="topsearch">
          <a id="topsearch-btn" class="topsearch-btn" href="javascript:void(0)"><i class="fa fa-search"></i></a>
          <form class="topsearch-form" action="{{ route('search.index') }}" method="GET">
            <input name="q" type="text" placeholder="Nhập tên hoặc mã sku của sản phẩm">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </nav>
    </div>
  </div>
</header>
@endif
