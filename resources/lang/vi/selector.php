<?php

return [
    'levels'      => [
        1 => 'Quản trị viên',
        2 => 'Biên tập viên',
        3 => 'Cộng tác viên'
    ],
    'status'      => [
        STATUS_ENABLE  => 'Kích hoạt',
        STATUS_DISABLE => 'Không kích hoạt',
    ],
    'format'      => [
        0         => 'Chuẩn',
        'video'   => 'Video',
        'audio'   => 'Audio',
        'gallery' => 'Bộ sưu tập'
    ],
    'icons'       => [
        0         => '<i class="icon-pin"></i>',
        'video'   => '<i class="fa fa-file-video-o"></i>',
        'audio'   => '<i class="fa fa-file-audio-o"></i>',
        'gallery' => '<i class="fa fa-picture-o"></i>'
    ],
    'post_status' => [
        STATUS_ENABLE  => 'Đã Đăng',
        STATUS_DISABLE => 'Xét duyệt',
    ],
    'page_status' => [
        STATUS_ENABLE  => 'Đã Đăng',
        STATUS_DISABLE => 'Xét duyệt',
    ],

    'orders' => [
        'status' => [
            1 => 'Chờ xử lý',
            2 => 'Xử lý xong',
            3 => 'Đang giao hàng',
            4 => 'Giao hàng thành công',
        ]
    ]
];