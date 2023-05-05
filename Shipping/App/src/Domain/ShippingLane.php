<?php

namespace App\Domain;

class ShippingLane
{
    public function __construct(
        private readonly float $minGrossPrice,
        private readonly float $maxGrossPrice,
        private readonly float $cost,
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
}
