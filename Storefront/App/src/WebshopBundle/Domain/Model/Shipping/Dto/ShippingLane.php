<?php

namespace App\WebshopBundle\Domain\Model\Shipping\Dto;

class ShippingLane
{
    private float $minGrossPrice;
    private float $maxGrossPrice;
    private float $cost;

    public function __construct(float $minGrossPrice, float $maxGrossPrice, float $cost)
    {
        $this->minGrossPrice = $minGrossPrice;
        $this->maxGrossPrice = $maxGrossPrice;
        $this->cost = $cost;
    }


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