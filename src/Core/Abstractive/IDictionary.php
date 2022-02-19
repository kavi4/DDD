<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive;

interface IDictionary
{
    /**
     * @return string[]
     */
    public static function getCodes(): array;
}
