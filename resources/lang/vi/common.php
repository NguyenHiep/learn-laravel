<?php
return [
    'buttons'  => array(
        'save'   => 'Lưu thông tin',
        'cancel' => 'Hủy bỏ',
        'create' => 'Thêm mới',
        'delete' => 'Xóa',
        'edit'   => 'Chỉnh sửa'
    ),
    'settings' => array(
        'settings' => array(
            'general' => array(
                'company_name'                  => 'Tên công ty',
                'company_name_placeholder'      => 'VD: TNHH Giadinhit.com',
                'company_zip'                   => 'Mã bưu chính',
                'company_zip_placeholder'       => 'VD: 700000',
                'company_address'               => 'Địa chỉ',
                'company_address_placeholder'   => 'VD: 42/11/2 Hồ Đắc Di, Tây Thạnh, Tân Phú',
                'company_tel'                   => 'Số điện thoại',
                'company_tel_placeholder'       => 'VD: 0167-6542-578',
                'company_fax'                   => 'Số fax',
                'company_fax_placeholder'       => 'VD: 082-246-9202',
                'company_copyright'             => 'Bản quyền website',
                'company_copyright_placeholder' => 'VD: Giadinhit.com',
                'subtitle'                      => 'Tiêu đề website',
                'subtitle_placeholder'          => 'VD: Thiết kế website chất lượng',
                'company_lat'                   => 'Vĩ độ',
                'company_lat_placeholder'       => 'VD: 34.395353',
                'company_lng'                   => 'Kinh độ',
                'company_lng_placeholder'       => 'VD: 132.45482',
            ),
            'others'  => array(
                'i18n_flg'                   => '',
                'email1'                     => 'Email người gửi',
                'email1_placeholder'         => 'VD: minhhiep.q@gmail.com',
                'email1_name'                => 'Tên hiển thị khi gửi email',
                'email1_name_placeholder'    => 'VD: Nguyễn Minh Hiệp',
                'about_privacy'              => 'Bảo mật',
                'about_terms'                => 'Điều khoản',
                'mail_smtp_host'             => 'Host SMTP',
                'mail_smtp_host_placeholder' => 'VD: smtp.gmail.com',
                'mail_smtp_port'             => 'Port SMTP',
                'mail_smtp_port_placeholder' => 'VD: 465 hoặc 587',
                'mail_smtp_user'             => 'Tài khoản SMTP',
                'mail_smtp_user_placeholder' => 'VD: nguyenhiep',
                'mail_smtp_pass'             => 'Mật khẩu SMTP',
                'mail_smtp_pass_placeholder' => 'VD: nguyenhiep',
            )
        ),
        'admins' => array(
            'username' => 'Tên tài khoản',
            'username_placeholder' => 'Vui lòng nhập tên tài khoản',
            'password' => 'Mật khẩu',
            'password_placeholder' => 'Vui lòng nhập mật khẩu',
            'level' => 'Cấp độ',
            'status' => 'Trạng thái'
        )
    ),
    'posts' => array(
        'posts' => array(
            'post_title' => 'Tiêu đề bài viết',
            'post_title_placeholder' => 'Nhập tiêu đề tại đây',
            'slug' => 'Đường dẫn tĩnh',
            'slug_placeholder' => '',
            'post_full' => 'Nội dung bài viết',
            'post_keyword' => 'Từ khóa bài viết',
            'post_keyword_placeholder' => 'Có dấu và cách nhau bằng dấu phẩy (,)',
            'post_intro' => 'Mô tả ngắn bài viết',
            'post_intro_placeholder' => 'Là đoạn mô tả ngắn khoảng 128 từ',
        ),
        'category' => array(
            'name'                    => 'Tên danh mục',
            'name_placeholder'        => 'VD: Danh mục',
            'slug'                    => 'Tên không dấu',
            'slug_placeholder'        => 'VD: danh-muc',
            'parent_id'               => 'Danh mục cha',
            'description'             => 'Mô tả danh mục',
            'description_placeholder' => 'Mô tả danh mục cho SEO',
        ),
        'tags'     => array(
            'name'                    => 'Tên thẻ',
            'name_placeholder'        => 'VD: lap trinh php',
            'slug'                    => 'Tên không dấu',
            'slug_placeholder'        => 'VD: lap-trinh-php',
            'description'             => 'Mô tả thẻ',
            'description_placeholder' => 'Mô tả thẻ cho SEO',
        ),
        'medias' => array(
            'mediasinfo' => array(
                'caption' => 'Chú thích',
                'caption_placeholder' => 'VD: Tệp tin đính kèm',
                'alt' => 'Văn bản thay thế',
                'alt_placeholder' => 'VD: Ảnh đẹp nè',
                'description' => 'Mô tả tệp tin',
                'description_placeholder' => 'Mô tả về tệp tin',
                'lightbox' => 'Sử dụng lightbox cho hình ảnh'
            )
        )
    ),
];