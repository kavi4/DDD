<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\Order\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\ValueObject;
use ddd\Test\App\Domain\Dictionary\OrderTypeDictionary;

class OrderType extends ValueObject
{
    protected $value;

    public function __construct(string $value)
    {
        if (!in_array($value, OrderTypeDictionary::getCodes())) {
            throw new InvalidArgumentException('Invalid order type');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
