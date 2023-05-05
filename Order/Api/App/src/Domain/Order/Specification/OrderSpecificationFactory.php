<?php

namespace App\Domain\Order\Specification;

interface OrderSpecificationFactory
{
    public function createHasOrderIdentifier(?string $orderId): OrderSpecification;
}
