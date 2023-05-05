<?php

namespace App\Domain;

interface ShippingMethodRepositoryInterface
{
    /** @return ShippingMethod[] */
    public function fetchShippingMethods(float $getCartTotal): array;

    public function getShippingMethodById(string $shippingMethodId): ShippingMethod;
}