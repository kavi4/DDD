<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive;

interface INumerable
{
    public function addition($value): self;

    public function subtraction($value): self;

    public function multiplication($value): self;

    public function division($value): self;

    public function modulo($value): self;

    public function exponentiation($value): self;
}
