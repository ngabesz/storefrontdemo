<?php

namespace App\WebshopBundle\Application\Checkout\ShippingMethod;

class CreateShippingMethodQuery
{
    public function __construct(
        private string $checkoutId,
        private string $shippingMethodId
    ) {
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }

    public function getShippingMethodId(): string
    {
        return $this->shippingMethodId;
    }
}
