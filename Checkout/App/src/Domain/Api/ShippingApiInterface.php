<?php

namespace App\Domain\Api;

use App\Domain\ShippingMethod;

interface ShippingApiInterface
{
    public function getShippingMethod(string $externalShippingMethodId): ShippingMethod;
}