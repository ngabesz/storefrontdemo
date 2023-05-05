<?php

namespace App\Domain;

class BillingAddress
{
    private string $country;
    private int $zipCode;
    private string $city;
    private string $address;

    /**
     * @param string $country
     * @param int $zipCode
     * @param string $city
     * @param string $address
     */
    public function __construct(string $country, int $zipCode, string $city, string $address)
    {
        $this->country = $country;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return int
     */
    public function getZipCode(): int
    {
        return $this->zipCode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
    
}
