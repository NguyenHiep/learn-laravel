<div class="sidebar">
  <div class="inner">
    <div class="widget widget-cart">
      <div class="widget-title">{{ __('Chuyên mục') }}</div>
      <div class="widget-content">
          <ul class="category-menu">
            <li class="active"><a href="{{ route('posts.show') }}" class="title">{{ __('Tin tức') }}</a></li>
            <li><a href="/page/faq" class="title">{{ __('Câu hỏi thường gặp') }}</a></li>
            <li><a href="/page/dieu-khoan-dich-vu" class="title">{{ __('Điều khoản dịch vụ') }}</a></li>
            <li><a href="/page/return-policy" class="title">{{ __('Chính sách đổi trả') }}</a></li>
            <li><a href="/page/delivery-policy" class="title">{{ __('Chính sách giao hàng') }}</a></li>
          </ul>
      </div>
    </div> <!--End widget-->

    <div class="widget widget-summary">
      <div class="widget-title">{{ __('Bài viết vừa xem') }}</div>
      <div class="widget-content">
            <ul class="recently-post">
              @if(!empty($posts_recent))
                  @foreach($posts_recent as $post_recent)
                      <li >
                        <div class="item">
                            <a href="{{ route('posts.detail', $post_recent->post_slug) }}" class="title">{{ $post_recent->post_title }}</a>
                            <div class="date">
                                <img src="{{ asset('theme-phiten/assets/images/svg/time.svg') }}" alt="{{ $post_recent->post_title }}" />
                                {{ \Carbon\Carbon::parse($posts_recent_original[$post_recent->id])->diffForHumans() }}
                            </div>
                        </div>
                      </li>
                    @endforeach
              @endif
            </ul>
      </div>
    </div> <!--End widget-->
  </div>
</div>