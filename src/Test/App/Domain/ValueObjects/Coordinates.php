<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\ValueObject;

class Coordinates extends ValueObject
{
    protected float $lat;
    protected float $long;

    public function __construct(float $lat, float $long)
    {
        if ($lat > 90 || $lat < -90) {
            throw new InvalidArgumentException('Invalid latitude');
        }

        if ($long > 180 || $long < -180) {
            throw new InvalidArgumentException('Invalid longitude');
        }

        $this->lat = $lat;
        $this->long = $long;
    }
}
