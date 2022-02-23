<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\Abstractive\IComparable;
use ddd\Core\Abstractive\INumerable;
use ddd\Core\ValueObject;
use ddd\Test\App\Domain\Assertion;

class Money extends ValueObject implements IComparable, INumerable
{
    protected string $currencyCode;
    protected float $value;

    public function __construct(string $currencyCode, float $value)
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

    public function getValue()
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

    public function addition($value)
    {
        if (is_numeric($value)) {
            return new self($this->currencyCode, $this->value + $value);
        }

        if ($value instanceof self) {
            return new self($this->currencyCode, $this->value + $value->getValue());
        }

        return new self($this->currencyCode, $this->value);
    }

    public function subtraction($value)
    {
        if (is_numeric($value)) {
            return new self($this->currencyCode, $this->value - $value);
        }

        if ($value instanceof Money) {
            return new self($this->currencyCode, $this->value - $value->getValue());
        }

        return new self($this->currencyCode, $this->value);
    }

    public function multiplication($value)
    {
        if (is_numeric($value)) {
            return new self($this->currencyCode, $this->value * $value);
        }

        if ($value instanceof self) {
            return new self($this->currencyCode, $this->value * $value->getValue());
        }

        return new self($this->currencyCode, $this->value);
    }

    public function division($value)
    {
        if (is_numeric($value)) {
            return new self($this->currencyCode, $this->value / $value);
        }

        if ($value instanceof self) {
            return new self($this->currencyCode, $this->value / $value->getValue());
        }

        return new self($this->currencyCode, $this->value);
    }

    public function modulo($value)
    {
        if (is_numeric($value)) {
            return new self($this->currencyCode, $this->value % $value);
        }

        if ($value instanceof self) {
            return new self($this->currencyCode, $this->value % $value->getValue());
        }

        return new self($this->currencyCode, $this->value);
    }

    public function exponentiation($value)
    {
        if (is_numeric($value)) {
            return new self($this->currencyCode, $this->value ^ $value);
        }

        if ($value instanceof self) {
            return new self($this->currencyCode, $this->value ^ $value->getValue());
        }

        return new self($this->currencyCode, $this->value);
    }
}
