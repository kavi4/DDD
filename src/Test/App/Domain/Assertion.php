<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain;

use ddd\Test\App\Domain\Dictionary\OrderTypeDictionary;

class Assertion extends \ddd\Core\Assertion
{
    public static function orderType(string $value): bool
    {
        return in_array($value, OrderTypeDictionary::getCodes());
    }
}
