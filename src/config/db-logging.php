<?php

use AlphaDevTeam\Logger\Logging\AlphaDevLogger;

return [
    'driver' => 'custom',
    'via' => AlphaDevLogger::class,
    'level' => env('LOG_LEVEL', 'debug'),
];
