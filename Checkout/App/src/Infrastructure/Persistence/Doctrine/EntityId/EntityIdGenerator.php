<?php

namespace App\Infrastructure\Persistence\Doctrine\EntityId;

use App\Domain\Shared\EntityId;
use App\Domain\Shared\EntityIdGeneratorInterface;
use Symfony\Component\Uid\Uuid;

class EntityIdGenerator implements EntityIdGeneratorInterface
{
    public function generate(): EntityId
    {
        return new EntityId(Uuid::v4()->toRfc4122());
    }
}