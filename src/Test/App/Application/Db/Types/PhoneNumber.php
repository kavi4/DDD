<?php
declare(strict_types=1);

namespace ddd\Test\App\Application\Db\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class PhoneNumber extends Type
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new \ddd\Test\App\Domain\ValueObjects\PhoneNumber($value);
    }

    /**
     * @param \ddd\Test\App\Domain\ValueObjects\PhoneNumber $value
     * @param AbstractPlatform $platform
     * @return mixed
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return str_replace(['-', '+'], '', $value->getValue());
    }

    public function getName()
    {
        return 'PhoneNumber';
    }
}
