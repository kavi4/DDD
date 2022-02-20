<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\Assertion;
use ddd\Core\ValueObject;

class Money extends ValueObject
{
    public string $currencyCode;
    public float $value;

    public function __construct(string $currencyCode, float $value)
    {
        $this->currencyCode = $currencyCode;

        if (!Assertion::money($value)) {
            throw new InvalidArgumentException('Invalid money value');
        }

        $this->value = $value;
    }
}
