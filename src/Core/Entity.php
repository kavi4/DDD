<?php
declare(strict_types=1);

namespace ddd\Core;

use ddd\Core\Abstractive\IEntity;
use Ramsey\Uuid\UuidInterface;

class Entity implements IEntity
{
    protected UuidInterface $id;

    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
