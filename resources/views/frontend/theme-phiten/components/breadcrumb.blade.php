@hasSection('breadcrumb')
    <div class="entry-breadcrumb">
        <div class="container">
            <ul class="list-inline breadcrumbs">
                <li><a href="{{ route('home')}}"><i class="icon icon-home" aria-hidden="true"></i>Trang chủ</a></li>
                @yield('breadcrumb')
            </ul>
        </div>
    </div>
@endif
