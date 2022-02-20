<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\User;

use ddd\Core\Aggregate;
use ddd\Test\App\Domain\ValueObjects\Name;
use Ramsey\Uuid\Uuid;

class User extends Aggregate
{
    protected Name $name;

    public function __construct(Uuid $id, Name $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName(): Name
    {
        return $this->name;
    }
}
