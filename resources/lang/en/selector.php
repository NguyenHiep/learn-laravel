<?php

return [
    'levels' => array(
        1 => 'Administrators',
        2 => 'Editor',
        3 => 'Collaborators'
    ),
    'status' => array(
        1 => 'Enable',
        2 => 'Disable',
    ),
    'theme_options_status' => [
        config('define.STATUS_THEME_OPTIONS_ENABLE')  => 'Enable',
        config('define.STATUS_THEME_OPTIONS_DISABLE') => 'Disable',
    ],
    'orders' => [
        'status' => [
            1 => 'Canceled',
            2 => 'Completed',
            3 => 'On Hold',
            4 => 'Pending',
            5 => 'Pending Payment',
            6 => 'Processing',
            7 => 'Refunded',
        ]
    ],

];
