<?php

namespace App\Domain\Checkout;

class ShippingAddress
{
    private string $address;
    private string $city;
    private string $postcode;
    private string $country;

    public function __construct(string $address, string $city, string $postcode, string $country)
    {
        $this->address = $address;
        $this->city = $city;
        $this->postcode = $postcode;
        $this->country = $country;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}
