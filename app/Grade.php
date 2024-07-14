<?php

namespace App;

enum Grade: string
{
    case A1 = 'A1';
    case B2 = 'B2';
    case B3 = 'B3';
    case C4 = 'C4';
    case C5 = 'C5';
    case C6 = 'C6';
    case D7 = 'D7';
    case E8 = 'E8';
    case F9 = 'F9';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
