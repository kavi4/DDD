<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\User;

use ddd\Core\Aggregate;
use ddd\Test\App\Domain\ValueObjects\Name;
use Ramsey\Uuid\UuidInterface;

class User extends Aggregate
{
    protected Name $name;

    public function __construct(UuidInterface $id, Name $name)
    {
        parent::__construct($id);
        $this->name = $name;
    }

    public function getName(): Name
    {
        return $this->name;
    }
}
