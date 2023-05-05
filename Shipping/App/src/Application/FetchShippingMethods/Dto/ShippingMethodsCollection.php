<?php

namespace App\Application\FetchShippingMethods\Dto;

use App\Domain\ShippingMethod;

class ShippingMethodsCollection
{
    /** @param ShippingMethod[] $shippingMethods */
    public function __construct(private array $shippingMethods) {}

    /** @return ShippingMethod[] */
    public function getShippingMethods(): array
    {
        return $this->shippingMethods;
    }
}
