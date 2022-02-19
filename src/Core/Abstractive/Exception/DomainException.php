<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive\Exception;

class DomainException extends \Exception
{
    /**
     * @var string
     */
    protected $code = '';

    public function __construct($message = "", \Throwable $previous = null)
    {
        parent::__construct($message, 'DomainException', $previous);
    }
}
