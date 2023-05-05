<?php

namespace App\WebshopBundle\Application\Shipping\GetShipping\Dto;

use App\WebshopBundle\Domain\Model\Shipping\Dto\ShippingMethod;

class GetShippingOutput
{
    /**
     * @var ShippingMethod[] $shippingMethods
     */
    private array $shippingMethods;

    public function __construct(array $shippingMethods)
    {
        $this->shippingMethods = $shippingMethods;
    }

    public function getShippingMethods(): array
    {
        return $this->shippingMethods;
    }
}