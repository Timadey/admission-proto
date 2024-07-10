<?php

namespace App;

enum Program :string
{
    case PUBLIC_HEALTH = 'PUBLIC HEALTH';
    case COMMUNITY_HEALTH = 'COMMUNITY HEALTH';
    case HEALTH_INFOMATION_MANAGEMENT = 'HEALTH INFOMATION MANAGEMENT';
    case MEDICAL_LABORATORY_SCIENCE = 'MEDICAL LABORATORY SCIENCE';
    case MIDWIFERY = 'MIDWIFERY';
    case GENERAL_NURSING = 'GENERAL NURSING';

    public static function values() : array
    {
        return array_column(self::cases(), 'value');

    }

}
