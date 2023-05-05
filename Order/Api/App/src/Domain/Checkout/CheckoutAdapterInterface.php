<?php

namespace App\Domain\Checkout;

interface CheckoutAdapterInterface
{
    public function getCheckoutById(string $checkoutId): Checkout;
}
