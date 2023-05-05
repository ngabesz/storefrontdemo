<?php

namespace App\Application\GetCheckout;

class GetCheckoutQuery
{
    public function __construct(
        public readonly string $checkoutId
    ) {}
}