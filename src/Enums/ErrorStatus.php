<?php

namespace AlphaDevTeam\Logger\Enums;

enum ErrorStatus: int
{
    case NEW = 0;
    case NON_CRITICAL = 1;
    case PENDING = 2;
    case SOLVED = 3;

    public static function names()
    {
        return array_column(self::cases(), 'name');
    }

    public static function fromName(string $name){

        return constant("self::$name");
    }

}
