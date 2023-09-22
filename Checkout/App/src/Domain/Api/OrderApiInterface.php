<?php

namespace App\Domain\Api;

interface OrderApiInterface
{
    public function createOrder(string $checkoutId): void;
}
