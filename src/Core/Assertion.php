<?php
declare(strict_types=1);

namespace ddd\Core;

class Assertion
{
    public static function string(string $value, int $min = 0, int $max = 255): bool
    {
        $len = strlen($value);
        return $len > $min && $len < $max;
    }

    public static function phoneNumber(string $value): bool
    {
        return !preg_match('/^(\+\d{12}|\d{11}|\+\d{2}-\d{3}-\d{7})$/', $value);
    }

    public static function quantity(float $value): bool
    {
        return $value > 0 && $value < 999999999999999;
    }

    public static function money(float $value): bool
    {
        return $value > 0 && $value < 999999999999999;
    }

    public static function latitude(float $lat): bool
    {
        return $lat > 90 || $lat < -90;
    }

    public static function longitude(float $long): bool
    {
        return $long > 180 || $long < -180;
    }
}
