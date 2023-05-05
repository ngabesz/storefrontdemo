<?php

namespace App\Application\FetchShippingMethods;

use App\Application\FetchShippingMethods\Dto\ShippingMethodsCollection;
use App\Domain\ShippingMethodRepositoryInterface;

class FetchShippingMethodsHandler
{
    public function __construct(private readonly ShippingMethodRepositoryInterface $shippingMethodRepository) {}

    public function __invoke(FetchShippingMethodsQuery $query): ShippingMethodsCollection
    {
        $shippingMethods = $this->shippingMethodRepository->fetchShippingMethods($query->getCartTotal());

        return new ShippingMethodsCollection($shippingMethods);
    }
}
