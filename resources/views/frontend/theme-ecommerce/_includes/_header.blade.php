
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
            <a href="compare.html">
              <i class="fa fa-bar-chart"></i>
              <span class="shop-menu-ttl">So sánh</span> (5)
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
              <a href="cart.html">
                <i class="fa fa-shopping-cart"></i>
                <span class="shop-menu-ttl">Giỏ hàng</span>
                (<b>0</b>)
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
          <a class="topcatalog-btn" href="catalog-list.html"><span>Tất cả </span>danh mục</a>
          <ul class="topcatalog-list">
            <li>
              <a href="catalog-list.html">
                Thời trang nữ
              </a>
              <i class="fa fa-angle-right"></i>
              <ul>
                <li>
                  <a href="catalog-list.html">
                    Áo khoác nữ
                  </a>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Váy đầm
                  </a>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Áo sơ mi nữ
                  </a>
                  <i class="fa fa-angle-right"></i>
                  <ul>
                    <li>
                      <a href="catalog-list.html">
                        Shoulder Bags
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Falabella
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Becks
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Clutches
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Travel Bags
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Đồ bộ nữ
                  </a>
                  <i class="fa fa-angle-right"></i>
                  <ul>
                    <li>
                      <a href="catalog-list.html">
                        Sunglasses
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Tech Cases
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Jewelry
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Stella
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="catalog-list.html">
                   Áo thun nữ
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="catalog-list.html">
                Thời trang nam
              </a>
              <i class="fa fa-angle-right"></i>
              <ul>
                <li>
                  <a href="catalog-list.html">
                    Áo khoác nam
                  </a>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Áo sơ mi nam
                  </a>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Áo thun nam
                  </a>
                  <i class="fa fa-angle-right"></i>
                  <ul>
                    <li>
                      <a href="catalog-list.html">
                        Bags
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Sunglasses
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Other Accessories
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Quần nam
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="catalog-list.html">
                Thời trang cho bé
              </a>
              <i class="fa fa-angle-right"></i>
              <ul>
                <li>
                  <a href="catalog-list.html">
                    Áo khoác cho bé
                  </a>
                  <i class="fa fa-angle-right"></i>
                  <ul>
                    <li>
                      <a href="catalog-list.html">
                        Outerwear
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        T-Shirts
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Blouses & Shirts
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Pants & Shorts
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Sleepwear & Underwear
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Skirts
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Váy đầm cho bé
                  </a>
                  <i class="fa fa-angle-right"></i>
                  <ul>
                    <li>
                      <a href="catalog-list.html">
                        Shoes & Accessories
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Jumpers & Cardigans
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Shirts
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Outerwear
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Swimwear
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Quần baby
                  </a>
                  <i class="fa fa-angle-right"></i>
                  <ul>
                    <li>
                      <a href="catalog-list.html">
                        Baby Sets
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Dresses & All-In-One
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Pants & Shorts
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Shoes & Accessories
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        T-shirts
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Outerwear
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li>
              <a href="catalog-list.html">
                Phụ kiện thời trang
              </a>
              <i class="fa fa-angle-right"></i>
              <ul>
                <li>
                  <a href="catalog-list.html">
                    Túi xách
                  </a>
                  <i class="fa fa-angle-right"></i>
                  <ul>
                    <li>
                      <a href="catalog-list.html">
                        Elyse
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Odette
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Brody
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Flats
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Sandals
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Ví cầm tay - quà tặng
                  </a>
                  <i class="fa fa-angle-right"></i>
                  <ul>
                    <li>
                      <a href="catalog-list.html">
                        Casual Shoes
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Sneakers
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Sandals
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Boots
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Mules & Clogs
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="catalog-list.html">
                    Giày dép
                  </a>
                  <i class="fa fa-angle-right"></i>
                  <ul>
                    <li>
                      <a href="catalog-list.html">
                        Girls
                      </a>
                    </li>
                    <li>
                      <a href="catalog-list.html">
                        Boys
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- Catalog menu - end -->
        
        <!-- Main menu - start -->
        <button type="button" class="mainmenu-btn">Menu</button>
        
        <ul class="mainmenu">
          <li><a href="#" class="active">Sản phẩm</a></li>
          <li><a href="#">Khuyến mãi</a></li>
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="#">Tin tức</a></li>
          <li><a href="#">Hướng dẫn thanh toán</a></li>
          <li><a href="#">Liên hệ</a></li>
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
      
      </nav>		</div>
  </div>
  <!-- Topmenu - end -->

</header>
<!-- Header - end -->
