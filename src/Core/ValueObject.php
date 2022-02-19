<?php
declare(strict_types=1);

namespace ddd\Core;

use ddd\Core\Abstractive\IValueObject;

class ValueObject implements IValueObject
{
    public function equals(IValueObject $object): bool
    {
        return false;
    }
}
