<?php

namespace App\Application\GetShippingMethodById;

use App\Domain\ShippingMethod;
use App\Domain\ShippingMethodRepositoryInterface;

class GetShippingMethodByIdHandler
{
    public function __construct(private readonly ShippingMethodRepositoryInterface $shippingMethodRepository) {}

    public function __invoke(GetShippingMethodByIdQuery $query): ShippingMethod
    {
        return $this->shippingMethodRepository->getShippingMethodById($query->getId());
    }
}