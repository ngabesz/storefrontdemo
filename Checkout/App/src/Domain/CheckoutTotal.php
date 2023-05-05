<?php

namespace App\Domain;

class CheckoutTotal
{
    public function __construct(
        private float $value,
        private string $currency
    ) {
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

}
