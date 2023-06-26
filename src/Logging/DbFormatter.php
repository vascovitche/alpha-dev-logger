<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\Formatter\NormalizerFormatter;

class DbFormatter extends NormalizerFormatter
{
    public function __construct()
    {
        parent::__construct();
    }

    public function format($record)
    {
        $record = parent::format($record);
        return $this->convertToDataBase($record);
    }

    protected function convertToDataBase(array $record)
    {
        $exception = $record['context']['exception'];

        $data = $record['extra'];
        $data['message'] = $record['message'];
        $data['class'] = $exception['class'];
        $data['code'] = $exception['code'];
        $data['file'] = $exception['file'];
        $data['trace'] = $exception['trace'];
        $data['level'] = $record['level'];
        $data['level_name'] = strtolower($record['level_name']);
        $data['channel'] = $record['channel'];

        return $data;
    }

}
