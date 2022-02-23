<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive;

interface INumerable
{
    public function addition($value);

    public function subtraction($value);

    public function multiplication($value);

    public function division($value);

    public function modulo($value);

    public function exponentiation($value);
}
