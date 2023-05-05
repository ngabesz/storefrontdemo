<?php

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Shared\EntityId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\BinaryType;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

class EntityIdType extends BinaryType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }
        return UuidV4::fromRfc4122($value)->toBinary();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }
        return new EntityId(UuidV4::fromBinary($value)->toRfc4122());
    }

    public function getName()
    {
        return 'entity_id';
    }
}