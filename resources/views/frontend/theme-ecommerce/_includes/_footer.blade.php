<!-- Footer - start -->
<footer class="footer-wrap">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="companyinfo">
          @if(!empty($settings->company_logo))
            <a href="{{ URL::to('/') }}">
              <img src="{{ asset(UPLOAD_SETTING.$settings->company_logo) }}" alt="{{ $settings->subtitle }}">
              {{ $settings->subtitle }}
            </a>
          @endif
        </div>
        <div class="f-block-list">
          <div class="f-block-wrap">
            <div class="f-block">
              <a href="#" class="f-block-btn" data-id="#f-block-modal-1">
                <div class="iframe-img">
                  <img src="http://placehold.it/300x127" alt="About us">
                </div>
                <div class="overlay-icon">
                  <i class="fa fa-info-circle"></i>
                </div>
              </a>
              <p class="f-info-ttl">Giới thiệu</p>
              <p>Shipping and payment information.</p>
            </div>
          </div>
          <div class="f-block-wrap">
            <div class="f-block">
              <a href="#" class="f-block-btn" data-id="#f-block-modal-2">
                <div class="iframe-img">
                  <img src="http://placehold.it/300x127" alt="Ask questions">
                </div>
                <div class="overlay-icon">
                  <i class="fa fa-phone"></i>
                </div>
              </a>
              <p class="f-info-ttl">Ask questions</p>
              <p>We call back within 10 minutes</p>
            </div>
          </div>
          <div class="f-block-wrap">
            <div class="f-block">
              <a href="#" class="f-block-btn" data-id="#f-block-modal-3" data-content="<iframe width='853' height='480' src='https://www.youtube.com/embed/kaOVHSkDoPY?rel=0&amp;showinfo=0' allowfullscreen></iframe>">
                <div class="iframe-img">
                  <img src="http://placehold.it/300x127" alt="Video (2 min)">
                </div>
                <div class="overlay-icon">
                  <i class="fa fa-play-circle"></i>
                </div>
              </a>
              <p class="f-info-ttl">Video (2 min)</p>
              <p>Watch a video about our store</p>
            </div>
          </div>
          <div class="f-block-wrap">
            <div class="f-block">
              <a href="#" class="f-block-btn" data-id="#f-block-modal-4">
                <div class="iframe-img">
                  <img src="http://placehold.it/300x127" alt="Our address">
                </div>
                <div class="overlay-icon">
                  <i class="fa fa-map-marker"></i>
                </div>
              </a>
              <p class="f-info-ttl">Our address</p>
              <p>Spain, Madrid, 45</p>
            </div>
          </div>
        </div>
        
        <div class="stylization f-block-modal f-block-modal-content" id="f-block-modal-1">
          <img class="f-block-modal-img" src="http://placehold.it/500x334" alt="About us">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam natus iste ullam vero, tenetur ab ipsa consectetur deleniti officiis ex debitis incidunt alias voluptatum, maxime placeat dolores veniam sunt at atque velit, soluta. Neque ea alias quia provident molestias, ratione aut esse placeat beatae sequi sed laudantium. Unde animi nihil esse, repellendus exercitationem dicta harum ab labore, voluptates explicabo in, quidem dolorum voluptas!
        </div>
        <div class="stylization f-block-modal f-block-modal-callback" id="f-block-modal-2">
          <div class="modalform">
            <form action="#" method="POST" class="form-validate">
              <p class="modalform-ttl">Callback</p>
              <input type="text" placeholder="Your name" data-required="text" name="name">
              <input type="text" placeholder="Your phone" data-required="text" name="phone">
              <button type="submit"><i class="fa fa-paper-plane"></i> Send</button>
            </form>
          </div>
        </div>
        <div class="stylization f-block-modal f-block-modal-video" id="f-block-modal-3">
        
        </div>
        <div class="stylization f-block-modal f-block-modal-map" id="f-block-modal-4">
          <div class="allstore-gmap">
            <div class="marker" data-zoom="15" data-lat="-37.81485261872975" data-lng="144.95655298233032" data-marker="img/marker.png">534-540 Little Bourke St, Melbourne VIC 3000, Australia</div>
          </div>
        </div>
        <div class="f-delivery">
          <img src="img/map.png" alt="">
          <h4>Free delivery in London</h4>
          <p>We will deliver within 1 hour</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container f-menu-list">
    <div class="row">
      <div class="f-menu">
        <h3>
          Giới thiệu
        </h3>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="#">Giới thiệu</a></li>
          <li><a href="#">Thông tin giao hàng</a></li>
          <li><a href="#">Chính sách bảo mật</a></li>
          <li><a href="#">Điều khoản và điều kiện</a></li>
        </ul>
      </div>
      
      <div class="f-menu">
        <h3>
         Dịch vụ khách hàng
        </h3>
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#">Liên hệ</a></li>
          <li><a href="#">Sơ đồ trang web</a></li>
        </ul>
      </div>
      <div class="f-menu">
        <h3>
         Tài khoản
        </h3>
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#">Tài khoản của tôi</a></li>
          <li><a href="#">Lịch sử đặt hàng</a></li>
          <li><a href="#">Danh sách yêu thích</a></li>
          <li><a href="#">Bản tin</a></li>
        </ul>
      </div>
      <div class="f-menu">
        <h3>
          Liên hệ
        </h3>
        <ul class="nav nav-pills nav-stacked">
          <li><a href="tel:{{ $settings->company_tel }}"><i class="fa fa-phone"></i>{{ $settings->company_tel }}</a></li>
          <li><a href="mailto:{{ $settings->company_email }}"><i class="fa fa-envelope"></i>{{ $settings->company_email }}</a></li>
        </ul>
      </div>
      <div class="f-subscribe">
        <h3>Đăng ký theo dõi</h3>
        <form class="f-subscribe-form" action="#">
          <input placeholder="Email của bạn" type="text">
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
        <div class="footer-copyright">
          <i><a href="{{ URL::to('/') }}">{{ $settings->company_name }}</a></i> {!! $settings->company_copyright !!}
        </div>
      </div>
    </div>
  </div>

</footer>
<!-- Footer - end -->