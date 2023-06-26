<?php

namespace AlphaDevTeam\Logger\Logging;

use Monolog\Formatter\NormalizerFormatter;

class TelegramFormatter extends NormalizerFormatter
{
    public function __construct()
    {
        parent::__construct();
    }

    public function format($record)
    {
        $record = parent::format($record);
        return $this->convertToMessage($record);
    }

    protected function convertToMessage(array $record): string
    {
        $extra = $this->convertExtraData($record['extra']);
        $exception = $record['context']['exception'];

        $data =
            "DATE:\n" . $record['datetime'] .
            "\n\nCHANNEL: " . $record['channel'] .
            "\n\nLEVEL: " . strtolower($record['level']) .
            "\n\nLEVEL NAME: " . strtolower($record['level_name']) .
            "\n\nMESSAGE:\n" . $record['message'] .
            "\n\nCLASS:\n" . $exception['class'] .
            "\n\nCODE: " . $exception['code'] .
            "\n\nFILE:\n" . $exception['file'] .
            "\n\n" . $extra;

        if (config('logger-alpha.telegram.trace')) {
            $data .= "\n\nTRACE:\n" . implode(",\n", $exception['trace']);
        }

        return $data;
    }

    private function convertExtraData($extra): string
    {
        array_walk($extra, function (&$value, $key) {
            $value = strtoupper($key) . ': ' . $value;
        });

        return implode(', ', $extra);
    }

}
