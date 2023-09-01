<?php

namespace App\Core\Enums;

enum DurationUnitsEnum: string {
    case hr = 'hour';
    case day = 'day';
    case week = 'week';
    case month = 'month';

    public static function unit($value)
    {
        return match ($value??'day') {
            'hr' => 'hour',
            'day' => 'day',
            'week' => 'week',
            'month' => 'month',
        };
    }
}