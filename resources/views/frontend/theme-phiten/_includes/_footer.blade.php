<div id="footer">
  @if(!empty($settings->params) && !empty($settings->params['enable_subscribe']))
  <div class="row-1 sec-tb">
    <div class="container">
      <div class="widget-ubscribe">
        <div class="row">
          <div class="col-md-4">
            <h3 class="widget-title">Theo dõi để nhận thêm ưu đãi!</h3>
          </div>
          <div class="col-md-8">
            <form action="" method="POST">
              @csrf
              <input type="email" placeholder="Nhập email để đăng ký" required/>
              <button type="submit" class="btn">Đăng Ký</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <img class=" tr lazy-hidden" data-lazy-type="image" data-lazy-src="{{ asset('theme-phiten/assets/images/subscribe.png') }}"  alt="" />
  </div>
  @endif
  <div class="sec-tb">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="widget widget-about">
            <h3 class="widget-title">THÔNG TIN LIÊN HỆ</h3>
            @if(!empty($settings) && !empty($settings->company_name))
              <p class="item"><strong>{{ $settings->company_name }}</strong></p>
            @endif
            <div class="rowlabel label-20">
              @if(!empty($settings) && !empty($settings->company_address))
                <div class="item">
                  <span class="title"> <i class="icon-map"></i></span>
                  <div class="text">{{ $settings->company_address }}</div>
                </div>
              @endif
              @if(!empty($settings) && !empty($settings->company_tel))
                <a class="item" href="tel:{{ $settings->company_tel }}">
                  <span class="title"> <i class="icon-phone-2"></i></span>
                  <div class="text">{{ $settings->company_tel }}</div>
                </a>
              @endif
              @if(!empty($settings) && !empty($settings->company_email))
                <a class="item" href="mailto:{{ $settings->company_email }}">
                  <span class="title"> <i class="icon-mail-2"></i></span>
                  <div class="text">{{ $settings->company_email }}</div>
                </a>
              @endif
            </div>

          </div>
        </div>
        <div class="col-lg-7">
          <div class="row">
            <div class="col-md-4">
              <div class="widget widget-menu">
                <h3 class="widget-title">PHITEN</h3>
                <ul class="menu menu-footer">
                  <li><a href="/page/about-us">Về Phiten Việt Nam</a></li>
                  <li><a href="/stores">Hệ thống cửa hàng</a></li>
                  <li><a href="/page/dieu-khoan-dich-vu">Điều khoản dịch vụ</a></li>
                  <li><a href="/page/career">Tuyển dụng</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="widget widget-menu">
                <h3 class="widget-title">FAQ</h3>
                <ul class="menu menu-footer">
                  <li><a href="/page/faq">Câu hỏi thường gặp</a></li>
                  <li><a href="/page/chinh-sach-bao-mat">Chính sách bảo mật</a></li>
                  <li><a href="/page/delivery-policy">Chính sách giao hàng</a></li>
                  <li><a href="/page/return-policy">Chính sách đổi trả</a></li>
                  <li><a href="/page/chinh-sach-thanh-toan">Chính sách thanh toán</a></li>
                </ul>

              </div>
            </div>
            <div class="col-md-4">
              <div class="widget widget-menu my-account">
                <h3 class="widget-title">Tài khoản của tôi</h3>
                <ul class="menu menu-footer 2">
                  <li><a href="#" data-toggle="modal" data-target="#myLogin" id="flogin">Đăng nhập / Đăng ký</a></li>
                  <li><a href="{{ route('checkout.cart.index') }}">Giỏ hàng của tôi</a></li>
                </ul>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div> <!--End #footer-->
<div class="copyright">
  <div class="container">
    <div class="row end">
      @if(!empty($settings) && !empty($settings->params['enable_social']))
      <div class="col-md-6">
          <ul class="blog-item-social">
            @if(!empty($settings->company_twitter))
              <li><a href="{{ $settings->company_twitter }}" target="_blank"><i class="icon icon-twitter"></i></a></li>
            @endif
            @if(!empty($settings->company_facebook))
              <li><a href="{{ $settings->company_facebook }}" target="_blank"><i class="icon icon-facebook-official"></i></a></li>
            @endif
            @if(!empty($settings->company_instagram))
              <li><a href="{{ $settings->company_instagram }}" target="_blank"><i class="icon icon-instagram"></i></a></li>
            @endif
          </ul>
      </div>
      @endif
    @if(!empty($settings) && !empty($settings->company_copyright) && !empty($settings->params['enable_copyright']))
      <div class="col-md-6">
          <span class="cl1">{!! $settings->company_copyright !!}</span>
      </div>
      @endif
    </div>
  </div>
</div>
<div id="back-top"><i class="icon icon-chevron-up"></i></div>
<div id="loading" v-show="loading">
  <img src="{{ asset('theme-phiten//assets/img/loading.gif') }}">
</div>