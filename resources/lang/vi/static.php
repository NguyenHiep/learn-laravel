<?php
return [
    'sidebars' => array(
        'manage' => array(
            'manage'    => 'Bảng điều khiển',
            'settings'  => array(
                'title'    => 'Cài đặt',
                'settings' => 'Cài đặt thông tin website',
                'admins'   => 'Quản trị tài khoản',
            ),
            'products'  => array(
                'title'  => 'Sản phẩm',
                'create' => 'Thêm sản phẩm',
                'list'   => 'Danh sách sản phẩm',
            ),
            'orders'    => array(
                'title'  => 'Đơn hàng',
                'create' => 'Tạo mới đơn hàng',
                'list'   => 'Danh sách đơn hàng',
            ),
            'posts'     => array(
                'title'    => 'Bài viết',
                'posts'    => 'Tất cả bài viết',
                'creates'  => 'Bài viết mới',
                'category' => 'Chuyên mục',
                'tags'     => 'Thẻ'
            ),
            'medias'    => array(
                'title'   => 'Hình ảnh',
                'medias'  => 'Danh sách hình ảnh',
                'creates' => 'Thêm mới hình ảnh'
            ),
            'pages'     => array(
                'title'  => 'Trang',
                'pages'  => 'Tất cả trang',
                'creates' => 'Thêm mới trang'
            ),
            'comments'  => 'Bình luận',
            'customers' => array(
                'title'     => 'Thành viên',
                'customers' => 'Tất cả thành viên',
                'creates'   => 'Thêm mới'
            ),
            'email'     => array(
                'title'     => 'Email',
                'contact'   => 'Email liên hệ',
                'subscribe' => 'Email đăng ký theo dõi'
            )
        )
    ),
    'manage'   => array(
        'settings' => array(
            'settings' => array(
                'page_title'     => 'Cài đặt thông tin website',
                'title_general'  => 'Thông tin chung',
                'title_other'    => 'Các thông tin khác',
                'title_email'    => 'Thông tin email',
                'title_host'     => 'Cấu hình host gửi mail SMTP',
                'title_personal' => 'Thông tin cá nhân và Điều khoản sử dụng',
            ),
            'admins'   => array()
        ),
        'posts'    => array(
            'posts'    => array(
                'page_title' => 'Quản lý bài viết',
                'created'    => 'Thêm mới bài viết',
                'edit'       => 'Cập nhật bài viết'
            ),
            'category' => array(
                'page_title' => 'Chuyên mục',
            ),
            'tags'     => array(
                'page_title' => 'Thẻ',
            ),
        ),
        'medias'   => array(
            'edit' => 'Cập nhật hình ảnh'
        )
    )
];