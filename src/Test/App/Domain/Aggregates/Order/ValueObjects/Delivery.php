<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\Order\ValueObjects;

use ddd\Core\DateTime;
use ddd\Core\ValueObject;
use ddd\Test\App\Domain\ValueObjects\Money;

final class Delivery extends ValueObject
{
    public Address $address;
    public DateTime $deliveryDate;
    public Money $deliveryCost;

    public function __construct(Address $address, DateTime $deliveryDate, Money $deliveryCost)
    {
        $this->address = $address;
        $this->deliveryDate = $deliveryDate;
        $this->deliveryCost = $deliveryCost;
    }
}
