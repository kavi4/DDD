<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\Order\ValueObjects;

use ddd\Core\Abstractive\Exception\DomainException;
use ddd\Core\ValueObject;
use ddd\Test\App\Domain\Assertion;
use ddd\Test\App\Domain\ITradable;
use ddd\Test\App\Domain\ValueObjects\Money;
use ddd\Test\App\Domain\ValueObjects\Name;
use ddd\Test\App\Domain\ValueObjects\Quantity;
use Ramsey\Uuid\Uuid;

class Position extends ValueObject implements ITradable
{
    protected Uuid $productId;
    protected Name $name;
    protected Quantity $quantity;
    protected string $measureUnit;
    protected Money $price;
    protected Money $discount;

    public function __construct(
        Uuid $productId,
        Name $name,
        Quantity $quantity,
        string $measureUnit,
        Money $price,
        Money $discount
    ) {
        if ($discount > $quantity->getValue() * $price->getValue()) {
            throw new DomainException('Discount cant be more then position sum');
        }

        if (Assertion::equalCurrency([$price, $discount])) {
            throw new DomainException('Operation with different currency not permitted');
        }

        $this->measureUnit = $measureUnit;
        $this->productId = $productId;
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function getTotalCost(): Money
    {
        return $this->price->multiplication($this->quantity->getValue())->subtraction($this->discount);
    }

    public function getDiscount(): Money
    {
        return $this->discount;
    }
}
