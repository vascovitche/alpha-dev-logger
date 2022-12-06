<?php

return [
    'telegram' => [
        'bot' => env('LOG_TELEGRAM_BOT_API'),
        'channel' => '@' . env('LOG_TELEGRAM_CHANNEL'),
        'trace' => false,
        'split_long_messages' => true
    ],

    'db' => [
        'remove_in_months' => [
            'soft' => 1,
            'totally' => 3,
        ]
    ],

    'panel' => [
        'go_back_route' => '/',

        'path' => 'admin',

        'middleware' => ['web'],
    ]

];
