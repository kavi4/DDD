<?php
declare(strict_types=1);

namespace ddd\Core;

use Ramsey\Uuid\Uuid;

use ddd\Core\Abstractive\IEntity;

class Entity implements IEntity
{
    protected Uuid $id;

    public function getId():Uuid
    {
        return $this->id;
    }
}
