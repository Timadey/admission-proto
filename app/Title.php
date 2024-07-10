<?php

namespace App;

enum Title :string
{
    case MR = 'Mr.';
    case MRS = 'Mrs.';
    case MS = 'Ms.';
    case DR = 'Dr.';

    public static function values() : array
    {
        return array_column(self::cases(), 'value');

    }
}
