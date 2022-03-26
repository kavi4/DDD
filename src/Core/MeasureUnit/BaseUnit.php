<?php
declare(strict_types=1);

namespace ddd\Core\MeasureUnit;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\Abstractive\IValueObject;

abstract class BaseUnit implements IMeasureUnit
{
    protected float $value;
    protected string $unit;
    protected const MAP = [];
    public const SOURCE_UNIT = '';

    public function __construct(float $value, string $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getSourceValue(): float
    {
        return $this->to(static::SOURCE_UNIT)->getValue();
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function equal($value): bool
    {
        if (is_numeric($value)) {
            return $this->value === $value;
        }

        if ($value instanceof IMeasureUnit) {
            return $this->value === $value->getValue() && $this->unit === $value->getUnit();
        }

        return false;
    }

    public function notEqual($value): bool
    {
        return !$this->$this->equal($value);
    }

    public function more($value): bool
    {
        if (is_numeric($value)) {
            return $this->value > $value;
        }

        if ($value instanceof IMeasureUnit) {
            return $this->value > $value->getValue() && $this->unit === $value->getUnit();
        }

        return false;
    }

    public function moreOrEqual($value): bool
    {
        if (is_numeric($value)) {
            return $this->value >= $value;
        }

        if ($value instanceof IMeasureUnit) {
            return $this->value >= $value->getValue() && $this->unit === $value->getUnit();
        }

        return false;
    }

    public function less($value): bool
    {
        if (is_numeric($value)) {
            return $this->value < $value;
        }

        if ($value instanceof IMeasureUnit) {
            return $this->value < $value->getValue() && $this->unit === $value->getUnit();
        }

        return false;
    }

    public function lessOrEqual($value): bool
    {
        if (is_numeric($value)) {
            return $this->value <= $value;
        }

        if ($value instanceof IMeasureUnit) {
            return $this->value <= $value->getValue() && $this->unit === $value->getUnit();
        }

        return false;
    }

    public function to(string $newUnit): static
    {
        if ($newUnit === $this->unit) {
            return $this;
        }

        $sourceUnits = static::MAP[$this->unit] * $this->value;
        $newValue = $sourceUnits * static::MAP[$newUnit];

        return new static($newValue, $newUnit);
    }

    public function addition($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value + $value, $this->unit);
        }

        if ($value instanceof static) {
            return new static ($this->value + $value->to($this->unit), $this->unit);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function subtraction($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value - $value, $this->unit);
        }

        if ($value instanceof static) {
            return new static ($this->value - $value->to($this->unit), $this->unit);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function multiplication($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value * $value, $this->unit);
        }

        if ($value instanceof static) {
            return new static ($this->value * $value->to($this->unit), $this->unit);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function division($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value / $value, $this->unit);
        }

        if ($value instanceof static) {
            return new static ($this->value / $value->to($this->unit), $this->unit);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function modulo($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value % $value, $this->unit);
        }

        if ($value instanceof static) {
            return new static ($this->value % $value->to($this->unit), $this->unit);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function exponentiation($value): static
    {
        if (is_numeric($value)) {
            return new static($this->value ^ $value, $this->unit);
        }

        if ($value instanceof static) {
            return new static ($this->value ^ $value->to($this->unit), $this->unit);
        }

        throw new InvalidArgumentException('Unsupported value type');
    }

    public function equals(IValueObject $object): bool
    {
        if ($object instanceof self) {
            return $this->equal($object);
        }

        return false;
    }
}
