<?php
return [
    'page_has_expired'    => 'Trang đã hết hạn, vui làm đóng trang và truy cập lại',
    'not_found_id_delete' => 'Không tìm thấy ID phần tử cần xóa',
    'buttons'  => array(
        'save'   => 'Lưu thông tin',
        'cancel' => 'Hủy bỏ',
        'create' => 'Thêm mới',
        'delete' => 'Xóa',
        'edit'   => 'Chỉnh sửa',
        'show'   => 'Xem',
    ),
    'settings' => array(
        'settings' => array(
            'general' => array(
                'company_name'                   => 'Tên công ty',
                'company_name_placeholder'       => 'VD: TNHH Giadinhit.com',
                'company_zip'                    => 'Mã bưu chính',
                'company_zip_placeholder'        => 'VD: 700000',
                'company_address'                => 'Địa chỉ',
                'company_address_placeholder'    => 'VD: 42/11/2 Hồ Đắc Di, Tây Thạnh, Tân Phú',
                'company_tel'                    => 'Số điện thoại',
                'company_tel_placeholder'        => 'VD: 0167-6542-578',
                'company_fax'                    => 'Số fax',
                'company_fax_placeholder'        => 'VD: 082-246-9202',
                'company_copyright'              => 'Bản quyền website',
                'company_copyright_placeholder'  => 'VD: Giadinhit.com',
                'subtitle'                       => 'Tiêu đề website',
                'subtitle_placeholder'           => 'VD: Thiết kế website chất lượng',
                'company_lat'                    => 'Vĩ độ',
                'company_lat_placeholder'        => 'VD: 34.395353',
                'company_lng'                    => 'Kinh độ',
                'company_lng_placeholder'        => 'VD: 132.45482',
                'company_email'                  => 'Email liên hệ',
                'company_email_placeholder'      => 'VD: example@gmail.com',
                'company_facebook'               => 'Facebook',
                'company_facebook_placeholder'   => 'VD: https://www.facebook.com/huongveanhmattroi',
                'company_googleplus'             => 'Google plus',
                'company_googleplus_placeholder' => 'VD: https://plus.google.com/113169842488203477180',
                'company_twitter'                => 'Twitter',
                'company_twitter_placeholder'    => 'VD: https://twitter.com/minhhiep_it',
                'company_vk'                     => 'VK',
                'company_vk_placeholder'         => 'VD: https://vk.com/minhhiepit',
                'company_instagram'              => 'Instagram',
                'company_instagram_placeholder'  => 'VD: https://www.instagram.com/hoclaptrinhweb/',
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
    ),
    'admins' => array(
        'id'                   => 'ID',
        'username'             => 'Tên tài khoản',
        'username_placeholder' => 'Vui lòng nhập tên tài khoản',
        'password'             => 'Mật khẩu',
        'password_placeholder' => 'Vui lòng nhập mật khẩu',
        'level'                => 'Cấp bậc',
        'status'               => 'Trạng thái',
        'email'                => 'Email',
        'email_placeholder'    => 'Vui lòng nhập email',
        'roles'                => 'Vai trò',
        'actions'              => 'Hành động'
    ),
    'roles' => array(
        'id'               => 'ID',
        'name'             => 'Tên vai trò',
        'name_placeholder' => 'Vui lòng nhập tên vai trò',
        'permission'       => 'Cho phép',
        'created_at'       => 'Ngày tạo',
        'updated_at'       => 'Ngày cập nhật',
        'actions'          => 'Hành động'
    ),
    'posts'    => array(
        'posts'    => array(
            'post_title'               => 'Tiêu đề bài viết',
            'post_title_placeholder'   => 'Nhập tiêu đề tại đây',
            'post_slug'                => 'Đường dẫn tĩnh',
            'slug_placeholder'         => '',
            'post_full'                => 'Nội dung bài viết',
            'post_keyword'             => 'Từ khóa bài viết',
            'post_keyword_placeholder' => 'Có dấu và cách nhau bằng dấu phẩy (,)',
            'post_intro'               => 'Mô tả ngắn bài viết',
            'post_intro_placeholder'   => 'Là đoạn mô tả ngắn khoảng 128 từ',
            'list' => array(
                'id'         => 'ID',
                'picture'    => 'Hình ảnh',
                'title'      => 'Tiêu đề',
                'category'   => 'Chuyên mục',
                'updated_at' => 'Cập nhật',
                'visit'      => 'Lượt xem',
                'status'     => 'Trạng thái',
                'actions'    => 'Hành động'
            )
        ),
        'category' => array(
            'name'                    => 'Tên chuyên mục',
            'name_placeholder'        => 'VD: Chuyên mục',
            'slug'                    => 'Tên không dấu',
            'slug_placeholder'        => 'VD: chuyen-muc',
            'parent_id'               => 'Chuyên mục cha',
            'description'             => 'Mô tả chuyên mục',
            'description_placeholder' => 'Mô tả chuyên mục cho SEO',
        ),
        'tags'     => array(
            'id'                      => 'ID',
            'name'                    => 'Tên thẻ',
            'name_placeholder'        => 'VD: lap trinh php',
            'slug'                    => 'Tên không dấu',
            'slug_placeholder'        => 'VD: lap-trinh-php',
            'description'             => 'Mô tả thẻ',
            'description_placeholder' => 'Mô tả thẻ cho SEO',
            'status'                  => 'Trạng thái',
            'actions'                 => 'Hành động'
        ),
        'medias'   => array(
            'mediasinfo' => array(
                'caption'                 => 'Chú thích',
                'caption_placeholder'     => 'VD: Tệp tin đính kèm',
                'alt'                     => 'Văn bản thay thế',
                'alt_placeholder'         => 'VD: Ảnh đẹp nè',
                'description'             => 'Mô tả tệp tin',
                'description_placeholder' => 'Mô tả về tệp tin',
                'lightbox'                => 'Sử dụng lightbox cho hình ảnh'
            )
        )
    ),
    'pages'    => array(
        'page_title'               => 'Tiêu đề trang',
        'page_title_placeholder'   => 'Nhập tiêu đề trang tại đây',
        'page_slug'                => 'Đường dẫn tĩnh',
        'page_slug_placeholder'    => '',
        'page_full'                => 'Nội dung trang',
        'page_keyword'             => 'Từ khóa trang',
        'page_keyword_placeholder' => 'Có dấu và cách nhau bằng dấu phẩy (,)',
        'page_intro'               => 'Mô tả ngắn trang',
        'page_intro_placeholder'   => 'Là đoạn mô tả ngắn khoảng 128 từ',
        'list' => array(
            'id'            => 'ID',
            'page_featured' => 'Hình ảnh',
            'page_title'    => 'Tiêu đề',
            'author'        => 'Tác giả',
            'created_at'    => 'Ngày tạo',
            'page_status'   => 'Trạng thái',
            'actions'       => 'Hành động'
        )
    ),
    'comments' => array(
        'title'             => 'Chỉnh sửa bình luận',
        'name'              => 'Người bình luận',
        'name_placeholder'  => 'Nhập họ và tên',
        'email'             => 'Email',
        'email_placeholder' => 'VD: example@gmail.com',
        'content'           => 'Nội dung',
        'url'               => 'Liên kết',
        'url_placeholder'   => 'VD: https://minhhhiep.info',
        'list' => array(
            'id'             => 'ID',
            'name'           => 'Họ và tên',
            'email'          => 'Email',
            'created_at'     => 'Ngày tạo',
            'ip_user'        => 'IP',
            'comment_status' => 'Trạng thái',
            'actions'        => 'Hành động'
        )
    ),
    'sliders' => array(
        'slider_img'                 => 'Hình ảnh',
        'slider_title'               => 'Tiêu đề',
        'slider_title_placeholder'   => 'VD: Chương trình khuyến mãi giảm giá',
        'slider_content'             => 'Nội dung',
        'slider_content_placeholder' => 'VD: Nội dung slider',
        'slider_url'                 => 'Link url',
        'slider_url_placeholder'     => 'VD: http://example.com',
        'slider_target'              => 'Target',
        'slider_status'              => 'Trạng thái',
        'slider_id'                  => 'ID',
        'slider_actions'             => 'Hành động'
    ),
    'products' => array(
        'title_general'     => 'Thông tin chung',
        'title_description' => 'Mô tả',
        'title_meta'        => 'SEO',
        'title_gallery'     => 'Ảnh gallery',
        'id'                => 'ID',
        'name'              => 'Tên sản phẩm',
        'sku'               => 'SKU',
        'price'             => 'Giá bán',
        'sale_price'        => 'Giá khuyến mãi',
        'quantity'          => 'Số lượng',
        'short_description' => 'Mô tả ngắn',
        'description'       => 'Mô tả chi tiết',
        'meta_title'        => 'Meta Title',
        'meta_keywords'     => 'Meta Keywords',
        'meta_description'  => 'Meta Description',
        'status'            => 'Trạng thái',
        'created_at'        => 'Ngày tạo',
        'actions'           => 'Hành động',
        'attributes' => array(
            'title_attribute'   => 'Thuộc tính sản phẩm',
            'size'              => 'Size',
            'sku'               => 'Mã',
            'price'             => 'Giá bán',
            'quantity'          => 'Tồn kho',
            'add_new_attribute' => 'Thêm thuộc tính mới',
        )
    ),
    'categories' => array(
        'id'      => 'ID',
        'name'    => 'Tên chuyên mục',
        'status'  => 'Trạng thái',
        'actions' => 'Hành động',
    ),
    'orders' => array(
        'id'         => 'ID',
        'ordered_at' => 'Ngày đặt hàng',
        'name'       => 'Khách hàng',
        'phone'      => 'Điện thoại',
        'total'      => 'Tổng tiền',
        'status'     => 'Trạng thái',
        'actions'    => 'Hành động',
    ),
    'customers' => array(
        'id'                     => 'ID',
        'first_name'             => 'Tên',
        'first_name_placeholder' => 'Vui lòng nhập tên',
        'last_name'              => 'Họ',
        'last_name_placeholder'  => 'Vui lòng nhập họ',
        'username'               => 'Tên tài khoản',
        'username_placeholder'   => 'Vui lòng nhập tên tài khoản',
        'password'               => 'Mật khẩu',
        'password_placeholder'   => 'Vui lòng nhập mật khẩu',
        'status'                 => 'Trạng thái',
        'phone'                  => 'Số điện thoại',
        'phone_placeholder'      => 'Vui lòng nhập số điện thoại',
        'email'                  => 'Email',
        'email_placeholder'      => 'Vui lòng nhập email',
        'gender'                 => 'Giới tính',
        'birthday'               => 'Sinh nhật',
        'address'                => 'Địa chỉ',
        'last_login'             => 'Lần đăng nhập cuối',
        'actions'                => 'Hành động'
    ),
    'data_empty' => 'Không có dữ liệu'
];