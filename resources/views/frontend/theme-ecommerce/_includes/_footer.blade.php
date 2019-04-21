@if(!empty($settings))
  <footer class="footer-wrap">
    <div class="container f-menu-list">
      <div class="row">
        <div class="f-menu">
          <h3>Chính sách chung</h3>
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="{{ url('gioi-thieu') }}" target="_blank">Giới thiệu</a></li>
            <li><a href="{{ url('thong-tin-giao-hang') }}" target="_blank">Thông tin giao hàng</a></li>
            <li><a href="{{ url('chinh-sach-bao-mat') }}" target="_blank">Chính sách bảo mật</a></li>
            <li><a href="{{ url('dieu-khoan-va-dieu-kien') }}" target="_blank">Điều khoản và điều kiện</a></li>
          </ul>
        </div>
        <div class="f-menu">
          <h3>Kết nối với chúng tôi</h3>
          <ul class="nav nav-pills nav-stacked">
            <li><a href="{{ url('lien-he') }}">Liên hệ</a></li>
            <li><a href="{{ url('so-do-trang-web') }}">Sơ đồ trang web</a></li>
          </ul>
        </div>
        @auth
        <div class="f-menu">
          <h3>Tài khoản</h3>
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#">Tài khoản của tôi</a></li>
            <li><a href="#">Lịch sử đặt hàng</a></li>
            <li><a href="#">Danh sách yêu thích</a></li>
            <li><a href="#">Bản tin</a></li>
          </ul>
        </div>
        @endauth
        <div class="f-menu">
          <h3>Thông tin</h3>
          <ul class="nav nav-pills nav-stacked">
            <li><a href="tel:{{ $settings->company_tel }}"><i class="fa fa-phone"></i>{{ $settings->company_tel }}</a></li>
            <li><a href="mailto:{{ $settings->company_email }}"><i class="fa fa-envelope"></i>{{ $settings->company_email }}</a></li>
          </ul>
        </div>
        <div class="f-subscribe">
          <h3>Đăng ký theo dõi</h3>
          <form class="f-subscribe-form" action="">
            <input placeholder="Email của bạn" type="text" />
            <button type="submit"><i class="fa fa-paper-plane"></i></button>
          </form>
          <p>Nhập email nếu bạn muốn nhận tin mới. Đăng ký theo dõi ngay bây giờ</p>
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
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
                <li><a href="{{ $social['url'] }}" rel="nofollow" target="_blank">{!! $social['icon'] !!} </a></li>
              @endif
            @endforeach
          </ul>
          <div class="footer-copyright">
            <i><a href="{{ URL::to('/') }}">{{ $settings->company_name }}</a></i> {!! $settings->company_copyright !!}
          </div>
        </div>
      </div>
    </div>
  </footer>
@endif