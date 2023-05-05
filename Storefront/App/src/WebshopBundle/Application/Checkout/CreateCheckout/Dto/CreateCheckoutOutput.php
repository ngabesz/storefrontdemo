<?php

namespace App\WebshopBundle\Application\Checkout\CreateCheckout\Dto;

class CreateCheckoutOutput
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