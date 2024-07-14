<?php

namespace App;

enum Subject: string
{
    case MATHEMATICS = 'MATHEMATICS';
    case ENGLISH = 'ENGLISH';
    case BIOLOGY = 'BIOLOGY';
    case CHEMISTRY = 'CHEMISTRY';
    case PHYSICS = 'PHYSICS';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
