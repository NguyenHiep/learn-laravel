<li id="li-1" class="{{ active(['home'],'current') }}">
    <a href="{{ route('home') }}">
        <span>Trang chủ</span>
    </a>
</li>
<li {{ route('page.show', 'gioi-thieu') == url()->current() ? 'current': '' }}>
    <a href="{{ route('page.show', 'gioi-thieu') }}">
        <span>Giới thiệu</span>
    </a>
</li>
<li class="children {{ active(['product.list'],'current') }}">
    <a href="{{ route('product.list') }}"><span>Sản phẩm</span></a>
    <ul>
        <li><a href="{{ route('category.show', 'thoi-trang-nu') }}">Thời trang nữ</a></li>
        <li><a href="{{ route('category.show', 'thoi-trang-nam') }}"><span>Thời trang nam</span></a></li>
        <li><a href="{{ route('category.show', 'thoi-trang-cho-be') }}"><span>Thời trang cho bé</span></a></li>
        <li><a href="{{ route('category.show', 'phu-kien-thoi-trang') }}"><span>Phụ kiện thời trang</span></a></li>
    </ul>
</li>

<li class="{{ active(['posts.show'],'current') }}">
    <a href="{{ route('posts.show') }}">
        <span>Tin tức</span>
    </a>
</li>
<li class="{{ active(['contact.index'],'current') }}">
    <a href="{{ route('contact.index') }}">
        <span>Liên Hệ</span>
    </a>
</li>
