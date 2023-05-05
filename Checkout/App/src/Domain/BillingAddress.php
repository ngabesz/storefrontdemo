<?php

namespace App\Domain;

use App\Domain\Shared\EntityId;

class BillingAddress
{

    public function __construct(
        private EntityId $addressId,
        private string $address,
        private string $country,
        private string $postcode,
        private string $city
    ) {
    }

    public function getAddressId(): EntityId
    {
        return $this->addressId;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function getCity(): string
    {
        return $this->city;
    }
}
