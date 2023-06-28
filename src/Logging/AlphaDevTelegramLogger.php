<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\Handler\MissingExtensionException;
use Monolog\Handler\TelegramBotHandler;
use Monolog\Level;
use Monolog\Logger;

class AlphaDevTelegramLogger
{
    /**
     * @throws MissingExtensionException
     */
    public function __invoke(): Logger
    {
        $logger = new Logger('alpha_dev_telegram_logger');

        $handler = new TelegramBotHandler(
            config('logger-alpha.telegram.bot'),
            config('logger-alpha.telegram.channel'),
            Level::Debug,
            true,
            null,
            null,
            null,
            config('logger-alpha.telegram.split_long_messages'),
            false,
            null
        );
        $formatter = new TelegramFormatter();
        $handler->setFormatter($formatter);

        $processor = new AlphaDevProcessor();

        $logger->pushHandler($handler);
        $logger->pushProcessor($processor);

        return $logger;
    }

}
