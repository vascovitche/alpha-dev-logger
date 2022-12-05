<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\Handler\TelegramBotHandler;
use Monolog\Logger;

class AlphaDevTelegramHandler extends TelegramBotHandler
{
    public function __construct($apiKey, $channel)
    {
        parent::__construct(
            $apiKey,
            $channel,
            Logger::DEBUG,
            true,
            null,
            null,
            null,
            config('logging-alpha.telegram.split_long_messages')
        );
    }

    protected function getDefaultFormatter(): TelegramFormatter
    {
        return new TelegramFormatter();
    }

}
