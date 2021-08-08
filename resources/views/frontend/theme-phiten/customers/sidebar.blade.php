<div class="uname">
    <span class="img">
      <img width="15" height="20" src="{{ asset('assets/images/svg/user.svg') }}" alt="user.svg">
    </span>
    <div class="text">
        <span class="t1">Tải khoản</span>
        <span class="t2">{{ auth()->user()->first_name . ' '. auth()->user()->last_name}}</span>
        <a href="{{ route('customer.profile') }}">Chỉnh sửa</a>
    </div>

</div>

<ul class="sidebar-menu menu-account">
    <li class="{{ active(['customer.dashboard'],'active') }}">
        <a href="{{ route('customer.dashboard') }}">
            <i class="icon icon-home" aria-hidden="true"></i> Bảng điều khiển
        </a>
    </li>

    <li class="{{ active(['customer.orders'],'active') }}">
        <a href="{{ route('customer.orders') }}">
            <i class="icon icon-cart3" aria-hidden="true"></i> Đơn hàng của tôi
        </a>
    </li>


    <li class="{{ active(['customer.reviews'],'active') }}">
        <a href="{{ route('customer.reviews') }}">
            <i class="icon icon-star-empty" aria-hidden="true"></i> Nhận xét của tôi
        </a>
    </li>

    <li class="{{ active(['customer.profile'],'active') }}">
        <a href="{{ route('customer.profile') }}">
            <i class="icon icon-user" aria-hidden="true"></i> Thông tin của tôi
        </a>
    </li>

    <li>
        <a href="javascript:void(0)"
           onclick="event.preventDefault();
           document.getElementById('customer-logout-form').submit();"
           ><i class="icon icon-close" aria-hidden="true"></i>
            Đăng xuất
        </a>
        <form id="customer-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
