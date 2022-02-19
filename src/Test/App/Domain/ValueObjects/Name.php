<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\ValueObject;

final class Name extends ValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        if (strlen($value) > 255) {
            throw new InvalidArgumentException('userName must be less 255 chars');
        }

        if (strlen($value) < 3) {
            throw new InvalidArgumentException('userName must be more 3 chars');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
