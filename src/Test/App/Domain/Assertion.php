<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain;

use ddd\Test\App\Domain\Dictionary\CurrencyCodeDictionary;
use ddd\Test\App\Domain\Dictionary\OrderTypeDictionary;
use ddd\Test\App\Domain\ValueObjects\Money;

class Assertion extends \ddd\Core\Assertion
{
    public static function orderType(string $value): bool
    {
        return in_array($value, OrderTypeDictionary::getCodes());
    }

    public static function currency(string $value): bool
    {
        return in_array($value, CurrencyCodeDictionary::getCodes());
    }

    /**
     * @param Money[] $moneys
     */
    public static function equalCurrency(array $moneys): bool
    {
        $comparator = null;

        foreach ($moneys as $money) {
            if ($comparator === null) {
                $comparator = $money->getCurrency();
                continue;
            }

            if ($comparator !== $money->getCurrency()) {
                return false;
            }
        }

        return true;
    }
}
