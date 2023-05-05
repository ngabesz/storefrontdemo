<?php

namespace App\WebshopBundle\Application\Checkout\CreateCheckout;

class CreateCheckoutQuery
{
    private string $cartId;

    public function __construct(string $cartId)
    {
        $this->cartId = $cartId;
    }

    public function getCartId(): string
    {
        return $this->cartId;
    }
}
