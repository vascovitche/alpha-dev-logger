<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\Logger;

class AlphaDevDBLogger
{
    public function __invoke(): Logger
    {
        $logger = new Logger('alpha_dev_db_logger');

        $handler = new AlphaDevDBHandler();
        $formatter = new DbFormatter();
        $handler->setFormatter($formatter);

        $processor = new AlphaDevProcessor();

        $logger->pushHandler($handler);
        $logger->pushProcessor($processor);

        return $logger;
    }

}
