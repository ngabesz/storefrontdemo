<?php

namespace App\WebshopBundle\Domain\Model\Checkout\Dto;

class ShippingMethod
{
    private string $shippingMethodId;
    private string $shippingMethodName;
    private float $shippingFee;

    public function __construct(string $shippingMethodId, string $shippingMethodName, float $shippingFee)
    {
        $this->shippingMethodId = $shippingMethodId;
        $this->shippingMethodName = $shippingMethodName;
        $this->shippingFee = $shippingFee;
    }

    public function getShippingMethodId(): string
    {
        return $this->shippingMethodId;
    }

    public function getShippingMethodName(): string
    {
        return $this->shippingMethodName;
    }

    public function getShippingFee(): float
    {
        return $this->shippingFee;
    }
}
