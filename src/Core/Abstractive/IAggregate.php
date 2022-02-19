<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive;

interface IAggregate extends IEntity
{
    /**
     * @return IDomainEvent[]
     */
    public function getDomainEvents(): array;
}
