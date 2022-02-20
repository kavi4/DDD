<?php
declare(strict_types=1);

namespace ddd\Test\App\Domain\ValueObjects;

use ddd\Core\Abstractive\Exception\InvalidArgumentException;
use ddd\Core\Assertion;
use ddd\Core\ValueObject;

class Coordinates extends ValueObject
{
    protected float $lat;
    protected float $long;

    public function __construct(float $lat, float $long)
    {
        if (!Assertion::latitude($lat)) {
            throw new InvalidArgumentException('Invalid latitude');
        }

        if (!Assertion::longitude($long)) {
            throw new InvalidArgumentException('Invalid longitude');
        }

        $this->lat = $lat;
        $this->long = $long;
    }
}
