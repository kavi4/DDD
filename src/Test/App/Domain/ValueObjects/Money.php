<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\ValueObject;

class Money extends ValueObject
{
    public string $currencyCode;
    public float $value;

    public function __construct(string $currencyCode, float $value)
    {
        $this->currencyCode = $currencyCode;

        if ($value < 0) {
            throw new InvalidArgumentException('Money value should be more then 0');
        }

        if ($value > 999999999999999) {
            throw new InvalidArgumentException('You cant have so much money');
        }

        $this->value = $value;
    }
}
