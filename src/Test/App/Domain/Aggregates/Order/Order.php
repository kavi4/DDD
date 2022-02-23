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
        $this->positions = $positions;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getTotalCost(): Money
    {
        $itemsCost = new Money($this->positions[0]->getTotalCost()->getCurrency(), 0);

        foreach ($this->positions as $position) {
            $itemsCost = $itemsCost->addition($position->getTotalCost());
        }
        return $itemsCost;
    }

    public function getDiscount(): Money
    {
        $itemsDiscount = new Money($this->positions[0]->getTotalCost()->getCurrency(), 0);

        foreach ($this->positions as $position) {
            $itemsDiscount = $itemsDiscount->addition($position->getDiscount());
        }

        return $itemsDiscount;
    }
}
