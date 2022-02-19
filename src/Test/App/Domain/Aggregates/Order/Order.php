<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\Order;

use ddd\Core\Abstractive\Exception\DomainException;
use ddd\Core\DateTime;
use ddd\Test\App\Domain\Aggregates\Order\ValueObjects\Delivery;
use ddd\Test\App\Domain\Aggregates\Order\ValueObjects\OrderType;
use Ramsey\Uuid\Uuid;

final class Order extends \ddd\Core\Aggregate
{
    protected Uuid $userId;
    protected Uuid $customerId;
    protected OrderType $type;
    protected Delivery $delivery;
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

        $this->id = $id;
        $this->userId = $userId;
        $this->customerId = $customerId;
        $this->type = $type;
        $this->delivery = $delivery;
        $this->positions = $positions;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
