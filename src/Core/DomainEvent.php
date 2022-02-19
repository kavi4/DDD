<?php
declare(strict_types=1);

namespace ddd\Core;

use ddd\Core\Abstractive\IAggregate;
use ddd\Core\Abstractive\IDomainEvent;
use ddd\Core\Abstractive\IValueObject;

class DomainEvent implements IDomainEvent
{
    protected IAggregate $owner;
    protected DateTime $created_at;

    public function __construct(IAggregate $owner, DateTime $created_at)
    {
        $this->owner = $owner;
        $this->created_at = $created_at;
    }

    public function getOwner(): IAggregate
    {
        return $this->owner;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function equals(IValueObject $object): bool
    {
        if ($object instanceof IDomainEvent) {
            return $this->owner->getId() === $object->getOwner()->getId()
                && $this->created_at === $object->getCreatedAt();
        }

        return false;
    }
}
