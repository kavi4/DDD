<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive\Exception;

class InvalidArgumentException extends DomainException
{
    protected $code = 'InvalidArgumentException';
}
