<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\Assertion;
use ddd\Core\ValueObject;

final class Name extends ValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        if (!Assertion::string($value, 3)) {
            throw new InvalidArgumentException('UserName invalid');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
