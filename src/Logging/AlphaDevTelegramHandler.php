<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\Handler\TelegramBotHandler;

class AlphaDevTelegramHandler extends TelegramBotHandler
{
    public function __construct($apiKey, $channel)
    {
        parent::__construct(
            $apiKey,
            $channel,
            Level::Debug,
            true,
            null,
            null,
            null,
            config('logger-alpha.telegram.split_long_messages'),
            false,
            null
        );
    }

    protected function formatter(): TelegramFormatter
    {
        return new TelegramFormatter();
    }

}
