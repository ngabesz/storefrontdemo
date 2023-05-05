<?php

namespace App\Domain;

class ShippingLane
{
    public function __construct(
        public string $id,
        public ShippingMethod $shippingMethod,
        public float $minGrossPrice,
        public float $maxGrossPrice,
        public float $cost,
    ) {}

    public function getMinGrossPrice(): float
    {
        return $this->minGrossPrice;
    }

    public function getMaxGrossPrice(): float
    {
        return $this->maxGrossPrice;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function getShippingMethodId(): string
    {
        return $this->shippingMethodId;
    }
}
