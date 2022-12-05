<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\Formatter\JsonFormatter;

class AlphaDevLogJson
{
    /**
     * Customize the given logger instance.
     *
     * @param \Illuminate\Log\Logger $logger
     * @return void
     */

    public function __invoke($logger)
    {
        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(new JsonFormatter(
                JsonFormatter::BATCH_MODE_JSON,
                true,
                false,
                true
            ));
        }

    }


}
