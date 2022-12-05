<?php

namespace AlphaDevTeam\Logger\Logging;

use AlphaDevTeam\Logger\Models\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class AlphaDevHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    /**
     * @inheritDoc
     */
    protected function write(array $record): void
    {
        $log = new Log();
        $log->fill($record['formatted']);
        $log->save();
    }

    protected function getDefaultFormatter(): DbFormatter
    {
        return new DbFormatter();
    }
}
