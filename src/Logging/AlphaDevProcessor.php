<?php

namespace AlphaDevTeam\Logger\Logging;

class AlphaDevProcessor
{
    public function __invoke(array $record): array
    {
        $record['extra'] = [
            'user_id' => auth()->user() ? auth()->user()->id : null,
        ];
        return $record;
    }

}
