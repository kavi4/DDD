<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Dictionary;

use ddd\Core\Abstractive\IDictionary;

final class OrderTypeDictionary implements IDictionary
{
    public const RETAIL = 'retail';
    public const DELIVERY = 'delivery';
    public const PICKUP = 'pickup';

    public static function getCodes(): array
    {
        return [
            static::RETAIL,
            static::DELIVERY,
            static::PICKUP,
        ];
    }
}
