<?php

namespace App\WebshopBundle\Application\Shipping\GetShipping;

class GetShippingQuery
{
    private float $cartTotal;

    public function __construct(float $cartTotal)
    {
        $this->cartTotal = $cartTotal;
    }

    public function getCartTotal(): float
    {
        return $this->cartTotal;
    }
}