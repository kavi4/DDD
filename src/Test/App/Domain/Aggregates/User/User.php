<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Aggregates\User;

use ddd\Core\Aggregate;
use ddd\Test\App\Domain\ValueObjects\Name;

class User extends Aggregate
{
    protected Name $name;

    public function getName(): Name
    {
        return $this->name;
    }
}
