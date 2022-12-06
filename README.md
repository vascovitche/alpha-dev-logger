# Alpha-Dev-Logger

## Requirements

<ul>
    <li>PHP v8.1+</li>
</ul>

## Description
Logger via db records, telegram and files. Based on standard Laravel logger. It also utilizes the Monolog library.
Plus, Alpha-Dev-Logger comes with a simple administration panel for reading, change status and delete log records.

## Installation

First step is install Alpha-Dev-Logger via the Composer command
```shell
composer require alpha-dev-team/logger
```

Next important step is published configuration file logger-alpha.php
```shell
php artisan vendor:publish --tag=logger-config --force
```

Also need run migration for new logs table:
```shell
php artisan migrate
```

## Configuration

### General
Since Alpha-Dev-Logger based on standard Laravel logger,
some configurations need to be made in logging.php in <b>channels</b> array.
For convenience, all needed changes in logging.php contain in logger-alpha.php in <b>channels</b> array.

#### DB
Set in logging.php in <b>channels</b>
(You can find it in logger-alpha.php in <b>channels</b> array):
```php
'db' => [
    'driver' => 'custom',
    'via' => \AlphaDevTeam\Logger\Logging\AlphaDevLogger::class,
    'level' => env('LOG_LEVEL', 'debug'),
],
```

#### Telegram
If You want to get log errors to Telegram channel set in logging.php in <b>channels</b>
(You can find it in logger-alpha.php in <b>channels</b> array):
```php
'telegram' => [
    'driver' => 'custom',
    'via' => \AlphaDevTeam\Logger\Logging\AlphaDevTelegramLogger::class,
    'level' => env('LOG_LEVEL', 'debug'),
],
```

For using Telegram notifications it is necessary to determine and set telegram api bot and telegram channel name in Your .env file:
```dotenv
LOG_TELEGRAM_BOT_API=999999999:AAAAAAAsAAA9AaAAAaaaAaAaAaAAA99aAaa
LOG_TELEGRAM_CHANNEL=telegram_channel
```
Also, You can make some changes for Telegram message view in logger-alpha.php.

#### Daily Files
If You want save log errors in files in json format, set in logging.php in <b>channels</b>
(You can find it in logger-alpha.php in <b>channels</b> array):
```php
'daily' => [
    'driver' => 'daily',
    'path' => storage_path('logs/daily/laravel.log'),
    'tap' => [\AlphaDevTeam\Logger\Logging\AlphaDevLogJson::class],
    'level' => env('LOG_LEVEL', 'debug'),
    'days' => 14,
],
```
Parameter days in daily array sets the retention period for files. You can set another.

#### General
Finally, make sure, that current log channel is <b>stack</b> in .env file.
```dotenv
LOG_CHANNEL=stack
```
And the last. Add to logging.php to array <b>channels.stack.channels</b> channels, that You will use:
```php
'stack' => [
    'driver' => 'stack',
    'channels' => ['daily', 'dev', 'telegram'],
    'ignore_exceptions' => false,
],
```

### Panel
Alpha-Dev-Logger comes with a simple administration panel for reading, change status and delete log records.
You can make some changes for panel rotes in logger-alpha.php.

### Fresh Logs
For refresh logs db retrieved special command RefreshLogsTable.
You can configure edge date time for soft delete records and edge date time for totally delete records in logger-alpha.php in <b>db.remove_in_months</b>

Also, You can add this command to Task Scheduling in App\Console\Kernel to <b>schedule</b> method.
For example every month:
```php
$schedule->command('refresh-logs:run')->monthly();
```


