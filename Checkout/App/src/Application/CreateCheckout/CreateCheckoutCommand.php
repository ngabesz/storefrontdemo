<?php

namespace App\Application\CreateCheckout;

class CreateCheckoutCommand
{
    public function __construct(
        public readonly string $cartId
    ) {
    }
}