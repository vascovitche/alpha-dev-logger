<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\LogRecord;

class AlphaDevProcessor
{
    public function __invoke(LogRecord $record): LogRecord
    {
        $record->offsetSet('extra', array_merge($record->offsetGet('extra'), [
            'user_id' => auth()->user() ? auth()->user()->id : null,
        ]));

        return $record;
    }

}
