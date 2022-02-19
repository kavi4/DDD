<?php
declare(strict_types=1);

namespace ddd\Core;

use ddd\Core\Abstractive\IAggregate;
use ddd\Core\Abstractive\IDomainEvent;

class Aggregate extends Entity implements IAggregate
{
    /**
     * @var IDomainEvent[]
     */
    protected $domainEvents = [];

    public function getDomainEvents(): array
    {
        return $this->domainEvents;
    }
}
