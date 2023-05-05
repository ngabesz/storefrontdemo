<?php

namespace App\WebshopBundle\Domain\Model\Shipping;

interface ShippingRepositoryInterface
{

    public function getShippingMethodsByCartTotal(float $cartTotal): Shipping;

}