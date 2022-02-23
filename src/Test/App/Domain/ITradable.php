<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain;

use ddd\Test\App\Domain\ValueObjects\Money;

interface ITradable
{
    public function getTotalCost(): Money;

    public function getDiscount(): Money;
}
