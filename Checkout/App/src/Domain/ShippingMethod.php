<?php

namespace App\Domain;

use App\Domain\Shared\EntityId;

class ShippingMethod
{
    public function __construct(
        private EntityId $shippingMethodId,
        private string $externalShippingMethodId,
        private string $shippingMethodName,
        private float $shippingFee
    ) {
    }

    /**
     * @return EntityId
     */
    public function getShippingMethodId(): EntityId
    {
        return $this->shippingMethodId;
    }

    /**
     * @return string
     */
    public function getExternalShippingMethodId(): string
    {
        return $this->externalShippingMethodId;
    }

    /**
     * @return string
     */
    public function getShippingMethodName(): string
    {
        return $this->shippingMethodName;
    }

    /**
     * @return float
     */
    public function getShippingFee(): float
    {
        return $this->shippingFee;
    }
}