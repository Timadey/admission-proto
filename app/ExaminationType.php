<?php

namespace App;

enum ExaminationType : string
{
    case NECO = 'NECO';
    case WAEC = 'WAEC';
    case GCE = 'GCE';
    case NABTEB = 'NABTEB';

    public static function values() : array
    {
        return array_column(self::cases(), 'value');

    }
}
