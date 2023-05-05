<?php

namespace App\WebshopBundle\Application\Checkout\ShippingMethod;

use App\WebshopBundle\Domain\Model\Checkout\Dto\ShippingMethod;

class CreateShippingMethodQuery
{
    private ShippingMethod $shippingMethod;

    public function __construct(ShippingMethod $shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
    }

    public function getShippingMethod(): ShippingMethod
    {
        return $this->shippingMethod;
    }
}