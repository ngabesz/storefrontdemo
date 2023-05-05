<?php

namespace App\WebshopBundle\Application\Checkout\ConfirmCheckout;

class ConfirmCheckoutCommand
{

    public function __construct(
        private string $checkoutId,
    )
    {
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }
}