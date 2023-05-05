<?php

namespace App\Domain;

use App\Domain\Shared\EntityId;

class Address
{
    public function __construct(
        private EntityId $addressId,
        private string $address,
        private string $country,
        private string $postcode,
        private string $city
    ) {
    }

    /**
     * @return EntityId
     */
    public function getAddressId(): EntityId
    {
        return $this->addressId;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }
}