<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Dictionary;

use ddd\Core\Abstractive\IDictionary;

class CurrencyCodeDictionary implements IDictionary
{
    public const RUB = 'rub';
    public const DOLLAR = 'dollar';

    public static function getCodes(): array
    {
        return [
            static::RUB,
            static::DOLLAR,
        ];
    }
}
