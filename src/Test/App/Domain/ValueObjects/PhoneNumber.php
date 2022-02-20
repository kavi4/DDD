<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\Assertion;
use ddd\Core\ValueObject;

class PhoneNumber extends ValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        if (!Assertion::phoneNumber($value)) {
            throw new InvalidArgumentException('Invalid phone number');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
