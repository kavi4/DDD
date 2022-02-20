<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\Order\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\Assertion;
use ddd\Core\ValueObject;
use ddd\Test\App\Domain\ValueObjects\Coordinates;

class Address extends ValueObject
{
    protected string $name;
    protected Coordinates $coordinates;

    public function __construct(string $name, Coordinates $coordinates)
    {
        if (!Assertion::string($name, 3)) {
            throw new InvalidArgumentException('Invalid address name');
        }

        $this->name = $name;
        $this->coordinates = $coordinates;
    }
}
