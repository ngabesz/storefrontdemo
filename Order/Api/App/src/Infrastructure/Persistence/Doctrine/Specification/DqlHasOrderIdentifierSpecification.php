<?php

namespace App\Infrastructure\Persistence\Doctrine\Specification;

use App\Domain\Order\Specification\CriteriaInterface;
use App\Domain\Order\Specification\OrderSpecification;

class DqlHasOrderIdentifierSpecification implements OrderSpecification
{
    public function __construct(private ?string $orderId) {
    }

    public function toCriteria(): CriteriaInterface
    {
        if ($this->orderId === null) {
            return DoctrineCriteria::create();
        }

        return DoctrineCriteria::create()
            ->andWhere(DoctrineCriteria::expr()->eq('id', $this->orderId));
    }
}
