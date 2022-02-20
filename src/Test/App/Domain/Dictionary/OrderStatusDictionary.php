<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\Dictionary;

use ddd\Core\Abstractive\IDictionary;

class OrderStatusDictionary implements IDictionary
{
    public const NEW = 'new';
    public const CONFIRMED = 'confirmed';
    public const COMPLETED = 'completed';
    public const CANCELED = 'canceled';

    public static function getCodes(): array
    {
        return [
            static::NEW,
            static::CONFIRMED,
            static::COMPLETED,
            static::CANCELED,
        ];
    }
}
