<?php

namespace App\Infrastructure\Persistence\Doctrine\Specification\Factory;

use App\Domain\Specification\CartSpecificationFactory;
use App\Domain\Specification\CartSpecification;
use App\Infrastructure\Persistence\Doctrine\Specification\DqlCartAndSpecification;
use App\Infrastructure\Persistence\Doctrine\Specification\DqlCartCreatedInIntervalSpecification;
use App\Infrastructure\Persistence\Doctrine\Specification\DqlHasOrderIdentifierSpecification;
use DateTimeImmutable;

class DqlCartSpecificationFactory implements CartSpecificationFactory
{

    public function createCartCreatedAtInterval(DateTimeImmutable $from, DateTimeImmutable $to): CartSpecification
    {
        return new DqlCartCreatedInIntervalSpecification($from, $to);
    }

    public function createHasCartCustomerIdentifier(): CartSpecification
    {
        return new DqlHasOrderIdentifierSpecification();
    }

    public function createAnd(CartSpecification ...$cartSpecifications): CartSpecification
    {
        return new DqlCartAndSpecification(...$cartSpecifications);
    }
}
