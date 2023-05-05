<?php

namespace App\WebshopBundle\Application\Checkout\GetCheckout;

class GetCheckoutQuery
{
    private string $checkoutId;

    public function __construct(string $checkoutId)
    {
        $this->checkoutId = $checkoutId;
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }
}