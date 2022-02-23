<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\ValueObject;
use ddd\Test\App\Domain\Assertion;

class Quantity extends ValueObject
{
    protected float $value;

    public function __construct(float $value)
    {
        if (Assertion::quantity($value)) {
            throw new InvalidArgumentException('Invalid quantity');
        }
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
