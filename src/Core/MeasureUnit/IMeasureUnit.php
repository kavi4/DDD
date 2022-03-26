<?php
declare(strict_types=1);

namespace ddd\Core\MeasureUnit;

use ddd\Core\Abstractive\IComparable;
use ddd\Core\Abstractive\INumerable;
use ddd\Core\Abstractive\IValueObject;

interface IMeasureUnit extends IValueObject, IComparable, INumerable
{
    public function getValue(): float;

    public function getSourceValue(): float;

    public function getUnit(): string;

    public function to(string $newUnit): static;
}
