<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\ValueObject;

class PhoneNumber extends ValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        if (!preg_match('^(\+\d{12}|\d{11}|\+\d{2}-\d{3}-\d{7})$', $value)) {
            throw new InvalidArgumentException('Invalid phone number');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
