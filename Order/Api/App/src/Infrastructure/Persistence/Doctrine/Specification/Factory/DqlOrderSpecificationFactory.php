<?php

namespace App\Infrastructure\Persistence\Doctrine\Specification\Factory;

use App\Domain\Order\Specification\OrderSpecification;
use App\Domain\Order\Specification\OrderSpecificationFactory;
use App\Infrastructure\Persistence\Doctrine\Specification\DqlHasOrderIdentifierSpecification;

class DqlOrderSpecificationFactory implements OrderSpecificationFactory
{
    public function createHasOrderIdentifier(?string $orderId): OrderSpecification
    {
        return new DqlHasOrderIdentifierSpecification($orderId);
    }
}
