<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Channels
    |--------------------------------------------------------------------------
    |
    | Alpha-Dev-Logger based on standard Laravel's logger.
    | Here are the custom channels, that you can copy and add to your config/logging.php
    | into 'channels' array
    |
    */
    'channels' => [
        /*
        |--------------------------------------------------------------------------
        | Data Base Channel
        |--------------------------------------------------------------------------
        |
        | For log errors into your 'logs' table, add 'db' array to config/logging.php
        | into 'channels' array. It's default channel for Alpha-Dev-Logger.
        | With it, you can use Alpha-Dev-Logger panel for convenient way to read errors.
        |
        */
        'db' => [
            'driver' => 'custom',
            'via' => \AlphaDevTeam\Logger\Logging\AlphaDevLogger::class,
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        /*
        |--------------------------------------------------------------------------
        | Telegram Channel
        |--------------------------------------------------------------------------
        |
        | For get immediately notification about error, you can use telegram channel.
        | Add 'telegram' array to config/logging.php into 'channels' array
        |
        */
        'telegram' => [
            'driver' => 'custom',
            'via' => \AlphaDevTeam\Logger\Logging\AlphaDevTelegramLogger::class,
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        /*
        |--------------------------------------------------------------------------
        | Daily File Channel
        |--------------------------------------------------------------------------
        |
        | For log errors into files every day in json format you can add
        | 'daily' array to config/logging.php into 'channels' array instead of the current.
        |
        */
        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/daily/laravel.log'),
            'tap' => [\AlphaDevTeam\Logger\Logging\AlphaDevLogJson::class],
            'level' => env('LOG_LEVEL', 'debug'),
            /*
            |--------------------------------------------------------------------------
            | Daily File Channel
            |--------------------------------------------------------------------------
            |
            | Select how long error file will be in your storage.
            |
            */
            'days' => 14,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Data Base Logs Refresh
    |--------------------------------------------------------------------------
    |
    | Here you can configure edge date time for soft delete records
    | and edge date time for totally delete records
    |
    */
    'db' => [
        /*
        |--------------------------------------------------------------------------
        | Data Base Logs Refresh
        |--------------------------------------------------------------------------
        |
        | Set how long error records will stay in logs table.
        | Set number of months.
        |
        */
        'remove_in_months' => [
            /*
            |--------------------------------------------------------------------------
            | Data Base Logs Refresh
            |--------------------------------------------------------------------------
            |
            | Set how long error records will stay in logs table before soft delete.
            |
            */
            'soft' => 1,

            /*
            |--------------------------------------------------------------------------
            | Data Base Logs Refresh
            |--------------------------------------------------------------------------
            |
            | Set how long error records will stay in logs table before totally delete.
            |
            */
            'totally' => 3,
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Telegram Notifications
    |--------------------------------------------------------------------------
    |
    | This manages if routes used for the admin panel should be registered.
    | Turn this value to false if you don't want to use Laratrust admin panel
    |
    */
    'telegram' => [
        /*
        |--------------------------------------------------------------------------
        | Telegram Notifications
        |--------------------------------------------------------------------------
        |
        | Telegram bot access token provided by BotFather.
        | Create telegram bot with https://telegram.me/BotFather  and use access token from it.
        | You can set it right here or in your .env file.
        |
        */
        'bot' => env('LOG_TELEGRAM_BOT_API'),

        /*
        |--------------------------------------------------------------------------
        | Telegram Notifications
        |--------------------------------------------------------------------------
        |
        | Telegram channel name. You can set it right here or in your .env file.
        | If you decide set channel name right here, must start with '@' symbol as prefix.
        |
        */
        'channel' => '@' . env('LOG_TELEGRAM_CHANNEL'),

        /*
        |--------------------------------------------------------------------------
        | Telegram Notifications
        |--------------------------------------------------------------------------
        |
        | Set should a message contain stack trace.
        |
        */
        'trace' => false,

        /*
        |--------------------------------------------------------------------------
        | Telegram Notifications
        |--------------------------------------------------------------------------
        |
        | True - split a message longer than MAX_MESSAGE_LENGTH into parts and send in multiple messages.
        | False - truncates a message that is too long.
        |
        */
        'split_long_messages' => true
    ],

    /*
    |--------------------------------------------------------------------------
    | Alpha-Dev-Logger Panel
    |--------------------------------------------------------------------------
    |
    | Section to manage everything related with the admin panel for log errors.
    |
    */
    'panel' => [
        /*
        |--------------------------------------------------------------------------
        | Alpha-Dev-Logger Panel
        |--------------------------------------------------------------------------
        |
        | The route where the go back link should point
        |
        */
        'go_back_route' => '/',

        /*
        |--------------------------------------------------------------------------
        | Alpha-Dev-Logger Panel
        |--------------------------------------------------------------------------
        |
        | This is the URI path where Alpha-Dev-Logger panel
        | will be accessible from.
        |
        */
        'path' => 'admin',

        /*
        |--------------------------------------------------------------------------
        | Alpha-Dev-Logger Panel
        |--------------------------------------------------------------------------
        |
        | These middleware will get attached onto each Alpha-Dev-Logger panel route.
        |
        */
        'middleware' => ['web'],
    ],

];
