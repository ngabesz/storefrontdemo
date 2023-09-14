<?php

namespace App\WebshopBundle\Domain\Model\Shipping;

use App\WebshopBundle\Domain\Model\Shipping\Dto\ShippingMethod;

class Shipping
{
    /**
     * @var ShippingMethod[] $shippingMethods
     */
    private array $shippingMethods;

    /**
     * @return ShippingMethod[]
     */
    public function getShippingMethods(): array
    {
        return $this->shippingMethods;
    }

    /**
     * @param ShippingMethod[] $shippingMethods
     */
    public function setShippingMethods(array $shippingMethods): void
    {
        $this->shippingMethods = $shippingMethods;
    }


}
