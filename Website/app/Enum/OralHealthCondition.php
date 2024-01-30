<?php

namespace App\Enums;

enum OralHealthCondition: string
{
    case NONE = 'none';
    case TRACE = 'trace';
    case SLIGHT = 'slight';
    case MODERATE = 'moderate';
    case HEAVY = 'heavy';
}
