<?php

namespace App\Application\SaveShippingAddress;

class SaveShippingAddressCommand
{
    public function __construct(
        public readonly string $checkoutId,
        public readonly string $address,
        public readonly string $country,
        public readonly string $postcode,
        public readonly string $city
    ) {}
}