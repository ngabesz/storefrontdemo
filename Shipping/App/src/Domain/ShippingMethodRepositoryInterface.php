<?php

namespace App\Domain;

interface ShippingMethodRepositoryInterface
{
    /** @return ShippingMethod[] */
    public function fetchShippingMethods(?float $cartTotal): array;

    public function getShippingMethodById(string $shippingMethodId): ShippingMethod;

    public function createShippingMethod(ShippingMethod $entity): void;

    public function deleteShippingMethod(string $shippingMethodId): void;
}