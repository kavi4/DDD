<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\Order\ValueObjects;

use ddd\Core\Abstractive\Exception\DomainException;
use ddd\Core\MeasureUnit\IMeasureUnit;
use ddd\Core\ValueObject;
use ddd\Test\App\Domain\Assertion;
use ddd\Test\App\Domain\ITradable;
use ddd\Test\App\Domain\ValueObjects\Money;
use ddd\Test\App\Domain\ValueObjects\Name;
use Ramsey\Uuid\Uuid;

class Position extends ValueObject implements ITradable
{
    protected Uuid $productId;
    protected Name $name;
    protected IMeasureUnit $quantity;
    protected Money $price;
    protected Money $discount;

    public function __construct(
        Uuid $productId,
        Name $name,
        IMeasureUnit $quantity,
        Money $price,
        Money $discount
    ) {
        if ($discount > $quantity->getValue() * $price->getValue()) {
            throw new DomainException('Discount cant be more then position sum');
        }

        if (Assertion::equalCurrency([$price, $discount])) {
            throw new DomainException('Operation with different currency not permitted');
        }

        $this->productId = $productId;
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function getTotalCost(): Money
    {
        return $this->price->multiplication($this->quantity->getSourceValue())->subtraction($this->discount);
    }

    public function getDiscount(): Money
    {
        return $this->discount;
    }

    public function applyDiscount(Money $discount): void
    {
        $total = $this->getTotalCost();
        if ($discount->more($total)) {
            $this->discount = $total;
        }
    }
}
