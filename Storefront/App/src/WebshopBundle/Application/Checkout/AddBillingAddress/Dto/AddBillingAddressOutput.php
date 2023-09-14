<?php

namespace App\WebshopBundle\Application\Checkout\AddShippingAddress\Dto;

use App\WebshopBundle\Domain\Model\Checkout\Dto\Address;

class AddBillingAddressOutput
{
    private Address $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}
