<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive;

interface IComparable
{
    public function equal(mixed $value): bool;

    public function notEqual(mixed $value): bool;

    public function more(mixed $value): bool;

    public function moreOrEqual(mixed $value): bool;

    public function less(mixed $value): bool;

    public function lessOrEqual(mixed $value): bool;

}
