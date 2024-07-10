<?php

namespace App;

enum Religion : string
{
    case CHRISTIANITY = 'Christianity';
    case ISLAM = 'Islam';

    public static function values() : array
    {
        return array_column(self::cases(), 'value');

    }
}
