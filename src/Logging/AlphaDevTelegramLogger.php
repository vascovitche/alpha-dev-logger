<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\Handler\MissingExtensionException;
use Monolog\Logger;

class AlphaDevTelegramLogger
{
    /**
     * @throws MissingExtensionException
     */
    public function __invoke(): Logger
    {
        $logger = new Logger('alpha_dev_telegram_logger');

        $handler = new AlphaDevTelegramHandler(config('logger-alpha.telegram.bot'), config('logger-alpha.telegram.channel'));

        $processor = new AlphaDevProcessor();
        $logger->pushHandler($handler);
        $logger->pushProcessor($processor);

        return $logger;
    }

}
