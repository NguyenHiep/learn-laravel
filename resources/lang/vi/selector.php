<?php

return [
    'default'     => [
        '' => 'Vui lòng chọn'
    ],
    'levels'      => [
        1 => 'Quản trị viên',
        2 => 'Biên tập viên',
        3 => 'Cộng tác viên'
    ],
    'status'      => [
        config('define.STATUS_ENABLE')  => 'Kích hoạt',
        config('define.STATUS_DISABLE') => 'Không kích hoạt',
    ],
    'format'      => [
        'standard' => 'Chuẩn',
        'video'    => 'Video',
        'audio'    => 'Audio',
        'gallery'  => 'Bộ sưu tập'
    ],
    'icons'       => [
        'standard' => '<i class="icon-pin"></i>',
        'video'    => '<i class="fa fa-file-video-o"></i>',
        'audio'    => '<i class="fa fa-file-audio-o"></i>',
        'gallery'  => '<i class="fa fa-picture-o"></i>'
    ],
    'post_status' => [
        config('define.STATUS_ENABLE')  => 'Đã Đăng',
        config('define.STATUS_DISABLE') => 'Xét duyệt',
    ],
    'page_status' => [
        config('define.STATUS_ENABLE')  => 'Đã Đăng',
        config('define.STATUS_DISABLE') => 'Xét duyệt',
    ],

    'orders' => [
        'status' => [
            1 => 'Chờ xử lý',
            2 => 'Xử lý xong',
            3 => 'Đang giao hàng',
            4 => 'Giao hàng thành công',
        ]
    ],
    'payment' => [
        1 => 'Thanh toán online',
        2 => 'Chuyển khoản ngân hàng',
        3 => 'Thanh toán khi nhận hàng',
    ],
    'target' => [
        1 => '_blank',
        2 => '_self',
        3 => '_parent',
        4 => '_top',
        5 => 'framename',
    ],
    'address_type' => [
        1 => 'Nhà riêng',
        2 => 'Tòa nhà(chung cư)',
    ]
];