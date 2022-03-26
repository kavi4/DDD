<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\Order;

use ddd\Core\Abstractive\Exception\DomainException;
use ddd\Core\Aggregate;
use ddd\Core\DateTime;
use ddd\Test\App\Domain\Aggregates\Order\ValueObjects\Delivery;
use ddd\Test\App\Domain\Aggregates\Order\ValueObjects\OrderType;
use ddd\Test\App\Domain\Aggregates\Order\ValueObjects\Position;
use ddd\Test\App\Domain\ITradable;
use ddd\Test\App\Domain\ValueObjects\Money;
use Ramsey\Uuid\Uuid;

class Order extends Aggregate implements ITradable
{
    protected Uuid $userId;
    protected Uuid $customerId;
    protected OrderType $type;
    protected Delivery $delivery;
    protected Money $discount;

    /**
     * @var Position[]
     */
    protected array $positions;
    protected DateTime $created_at;
    protected DateTime $updated_at;

    public function __construct(
        Uuid $id,
        Uuid $userId,
        Uuid $customerId,
        OrderType $type,
        Delivery $delivery,
        Money $discount,
        array $positions,
        DateTime $created_at,
        DateTime $updated_at
    ) {
        if ($delivery->deliveryDate < $created_at) {
            throw new DomainException('Delivery date cant be less creation date');
        }

        if (count($positions) < 1) {
            throw new DomainException('Order cant be empty');
        }

        $this->id = $id;
        $this->userId = $userId;
        $this->customerId = $customerId;
        $this->type = $type;
        $this->delivery = $delivery;
        $this->discount = $discount;
        $this->positions = $positions;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getTotalCost(): Money
    {
        $itemsCost = 0;

        foreach ($this->positions as $position) {
            $itemsCost += $position->getTotalCost()->getValue();
        }

        $itemsCost += $this->delivery->deliveryCost->getValue();

        return new Money($itemsCost);
    }

    public function getDiscount(): Money
    {
        $itemsDiscount = 0;

        foreach ($this->positions as $position) {
            $itemsDiscount += $position->getDiscount()->getValue();
        }

        return new Money($itemsDiscount);
    }

    public function applyDiscount(Money $discount): void
    {
        $total = $this->getTotalCost();

        $applyDiscount = $discount;

        if ($discount->more($total)) {
            $applyDiscount = $total;
        }

        $stockDiscount = new Money($total->getValue());

        foreach ($this->positions as $position) {
            $positionDiscount = $position->getTotalCost()->division($total)->multiplication($applyDiscount);
            $position->applyDiscount($positionDiscount);
            $stockDiscount = $stockDiscount->division($positionDiscount);
        }

        $this->discount = $stockDiscount;
    }
}
