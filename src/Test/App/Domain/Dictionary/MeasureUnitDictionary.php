<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Dictionary;

use ddd\Core\Abstractive\IDictionary;

class MeasureUnitDictionary implements IDictionary
{
    public const KILOGRAM = 'kilogram';
    public const LITER = 'liter';
    public const METER = 'meter';

    public static function getCodes(): array
    {
        return [
            static::KILOGRAM,
            static::LITER,
            static::METER,
        ];
    }
}
