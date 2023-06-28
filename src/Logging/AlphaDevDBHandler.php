<?php

namespace AlphaDevTeam\Logger\Logging;

use AlphaDevTeam\Logger\Models\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;

class AlphaDevDBHandler extends AbstractProcessingHandler
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
        $log->fill($record->formatted);
        $log->save();
    }

}
