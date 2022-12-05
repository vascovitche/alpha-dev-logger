<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\Logger;

class AlphaDevLogger
{
    public function __invoke(): Logger
    {
        $logger = new Logger('alpha_dev_logger');
        $handler = new AlphaDevHandler();
        $processor = new AlphaDevProcessor();
        $logger->pushHandler($handler);
        $logger->pushProcessor($processor);

        return $logger;
    }

}
