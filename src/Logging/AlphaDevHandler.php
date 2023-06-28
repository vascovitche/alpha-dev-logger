<?php

namespace AlphaDevTeam\Logger\Logging;

use AlphaDevTeam\Logger\Models\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;

class AlphaDevHandler extends AbstractProcessingHandler
{
    public function __construct($level = Level::Debug, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    /**
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $log = new Log();
        $log->fill($record->toArray()['formatted']);
        $log->save();
    }

    protected function formatter(): DbFormatter
    {
        return new DbFormatter();
    }
}
