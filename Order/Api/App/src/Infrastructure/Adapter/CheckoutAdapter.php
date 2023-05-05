<?php

namespace App\Infrastructure\Adapter;

use App\Domain\Checkout\Checkout;
use App\Domain\Checkout\CheckoutAdapterInterface;

class CheckoutAdapter implements CheckoutAdapterInterface
{
    public function getCheckoutById(string $checkoutId): Checkout
    {
        return new Checkout();
    }
}
