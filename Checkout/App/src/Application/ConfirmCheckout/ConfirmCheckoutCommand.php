<?php

namespace App\Application\ConfirmCheckout;

class ConfirmCheckoutCommand
{
    public function __construct(
        public readonly string $checkoutId
    ) {}
}