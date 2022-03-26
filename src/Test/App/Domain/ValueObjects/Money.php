<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\Abstractive\IComparable;
use ddd\Core\Abstractive\INumerable;
use ddd\Core\ValueObject;
use ddd\Test\App\Domain\Assertion;
use ddd\Test\App\Domain\Dictionary\CurrencyCodeDictionary;

class Money extends ValueObject implements IComparable, INumerable
{
    protected string $currencyCode;
    protected float $value;

    public function __construct(float $value, string $currencyCode = CurrencyCodeDictionary::RUB)
    {
        $this->currencyCode = $currencyCode;

        if (!Assertion::money($value)) {
            throw new InvalidArgumentException('Invalid money value');
        }

        if (!Assertion::currency($currencyCode)) {
            throw new InvalidArgumentException('Invalid currency code');
        }

        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getCurrency(): string
    {
        return $this->currencyCode;
    }

    public function equal($value): bool
    {
        if (is_numeric($value)) {
            return $value === $this->value;
        }

        if ($value instanceof self) {
            return $value->getValue() === $this->value;
        }

        return false;
    }

    public function notEqual($value): bool
    {
        return !$this->equal($value);
    }

    public function more($value): bool
    {
        if (is_numeric($value)) {
            return $value > $this->value;
        }

        if ($value instanceof self) {
            return $this->value > $value->getValue();
        }

        return false;
    }

    public function moreOrEqual($value): bool
    {
        if (is_numeric($value)) {
            return $value >= $this->value;
        }

        if ($value instanceof self) {
            return $this->value >= $value->getValue();
        }
        return false;
    }

    public function less($value): bool
    {
        if (is_numeric($value)) {
            return $value < $this->value;
        }

        if ($value instanceof self) {
            return $this->value < $value->getValue();
        }

        return false;
    }

    public function lessOrEqual($value): bool
    {
        if (is_numeric($value)) {
            return $value <= $this->value;
        }

        if ($value instanceof self) {
            return $this->value <= $value->getValue();
        }

        return false;
    }

    public function addition($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value + $value, $this->currencyCode);
        }

        if ($value instanceof self) {
            return new static($this->value + $value->getValue(), $this->currencyCode);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function subtraction($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value - $value, $this->currencyCode);
        }

        if ($value instanceof Money) {
            return new static($this->value - $value->getValue(), $this->currencyCode);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function multiplication($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value * $value, $this->currencyCode);
        }

        if ($value instanceof self) {
            return new static($this->value * $value->getValue(), $this->currencyCode);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function division($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value / $value, $this->currencyCode);
        }

        if ($value instanceof self) {
            return new static($this->value / $value->getValue(), $this->currencyCode);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function modulo($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value % $value, $this->currencyCode);
        }

        if ($value instanceof self) {
            return new static($this->value % $value->getValue(), $this->currencyCode);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function exponentiation($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value ^ $value, $this->currencyCode);
        }

        if ($value instanceof self) {
            return new static($this->value ^ $value->getValue(), $this->currencyCode);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }
}
