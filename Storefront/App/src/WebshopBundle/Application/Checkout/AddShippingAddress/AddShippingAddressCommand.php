<?php

namespace App\WebshopBundle\Application\Checkout\AddShippingAddress;

use App\WebshopBundle\Domain\Model\Checkout\Dto\Address;

class AddShippingAddressCommand
{
    private string $checkoutId;
    private Address $address;

    public function __construct(string $checkoutId, Address $address)
    {
        $this->checkoutId = $checkoutId;
        $this->address = $address;
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}
