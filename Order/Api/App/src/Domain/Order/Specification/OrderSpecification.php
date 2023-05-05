<?php

namespace App\Domain\Order\Specification;

interface OrderSpecification
{
    public function toCriteria(): CriteriaInterface;
}
