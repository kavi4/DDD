<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive;

interface IValueObject
{
    public function equals(IValueObject $object): bool;
}
