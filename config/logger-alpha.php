<?php

return [
    'channels' => [
        'db' => [
            'driver' => 'custom',
            'via' => \AlphaDevTeam\Logger\Logging\AlphaDevLogger::class,
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'telegram' => [
            'driver' => 'custom',
            'via' => \AlphaDevTeam\Logger\Logging\AlphaDevTelegramLogger::class,
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/daily/laravel.log'),
            'tap' => [\AlphaDevTeam\Logger\Logging\AlphaDevLogJson::class],
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
        ],
    ],

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
    ],

];
