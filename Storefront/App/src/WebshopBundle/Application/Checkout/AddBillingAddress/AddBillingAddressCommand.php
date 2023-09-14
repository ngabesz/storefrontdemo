<?php

namespace App\WebshopBundle\Application\Checkout\AddBillingAddress;

use App\WebshopBundle\Domain\Model\Checkout\Dto\Address;

class AddBillingAddressCommand
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
