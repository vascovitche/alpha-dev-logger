<?php

use AlphaDevTeam\Logger\Logging\AlphaDevLogger;
use AlphaDevTeam\Logger\Logging\AlphaDevTelegramLogger;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['daily', 'db', 'telegram'],
        'ignore_exceptions' => false,
    ],

    'single' => [
        'driver' => 'single',
        'path' => storage_path('logs/laravel.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'daily' => [
        'driver' => 'daily',
        'path' => storage_path('logs/amo/laravel.log'),
        'formatter' => 'default',
        'tap' => [AlphaDevTeam\Logger\Logging\AlphaDevLogJson::class],
        'level' => env('LOG_LEVEL', 'debug'),
        'days' => 14,
    ],

    'slack' => [
        'driver' => 'slack',
        'url' => env('LOG_SLACK_WEBHOOK_URL'),
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => env('LOG_LEVEL', 'critical'),
    ],

    'papertrail' => [
        'driver' => 'monolog',
        'level' => env('LOG_LEVEL', 'debug'),
        'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
        'handler_with' => [
            'host' => env('PAPERTRAIL_URL'),
            'port' => env('PAPERTRAIL_PORT'),
            'connectionString' => 'tls://' . env('PAPERTRAIL_URL') . ':' . env('PAPERTRAIL_PORT'),
        ],
    ],

    'stderr' => [
        'driver' => 'monolog',
        'level' => env('LOG_LEVEL', 'debug'),
        'handler' => StreamHandler::class,
        'formatter' => env('LOG_STDERR_FORMATTER'),
        'with' => [
            'stream' => 'php://stderr',
        ],
    ],

    'syslog' => [
        'driver' => 'syslog',
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'errorlog' => [
        'driver' => 'errorlog',
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'null' => [
        'driver' => 'monolog',
        'handler' => NullHandler::class,
    ],

    'emergency' => [
        'path' => storage_path('logs/laravel.log'),
    ],

    'db' => [
        'driver' => 'custom',
        'via' => AlphaDevLogger::class,
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'telegram' => [
        'driver' => 'custom',
        'via' => AlphaDevTelegramLogger::class,
        'level' => env('LOG_LEVEL', 'debug'),
    ]
];
