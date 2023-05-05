<?php

namespace App\Application\FetchShippingMethods;

class FetchShippingMethodsQuery
{
    public function __construct(
        private readonly ?float $cartTotal = null,
        private readonly ?string $shippingMethodId = null
    ) {}

    public function getCartTotal(): float
    {
        return $this->cartTotal;
    }

    public function getShippingMethodId(): string
    {
        return $this->shippingMethodId;
    }
}
