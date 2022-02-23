<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive;

interface IComparable
{
    public function equal($value): bool;

    public function notEqual($value): bool;

    public function more($value): bool;

    public function moreOrEqual($value): bool;

    public function less($value): bool;

    public function lessOrEqual($value): bool;

}
