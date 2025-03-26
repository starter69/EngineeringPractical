<?php

namespace App\Enums;

enum Cities: string
{
    case NEW_YORK = 'New York';
    case CALIFORNIA = 'California';
    case MIAMI = 'Miami';

    public function coordinates(): array
    {
        return match ($this) {
            self::NEW_YORK => ['latitude' => 40.7128, 'longitude' => -74.0060],
            self::CALIFORNIA => ['latitude' => 36.7783, 'longitude' => -119.4179],
            self::MIAMI => ['latitude' => 25.7617, 'longitude' => -80.1918],
        };
    }

    public static function getCities(): array
    {
        return array_column(self::cases(), 'value');
    }
}
