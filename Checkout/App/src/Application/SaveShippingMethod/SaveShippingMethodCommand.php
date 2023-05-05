<?php

namespace App\Application\SaveShippingMethod;

class SaveShippingMethodCommand
{
    public function __construct(
        public readonly string $checkoutId,
        public readonly string $externalShippingMethodId
    ){}
}