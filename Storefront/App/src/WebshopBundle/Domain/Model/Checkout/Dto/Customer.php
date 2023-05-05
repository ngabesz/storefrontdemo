<?php

namespace App\WebshopBundle\Domain\Model\Checkout\Dto;

class Customer
{
    private string $email;
    private string $firstName;
    private string $lastName;
    private string $phone;

    public function __construct(string $email, string $firstName, string $lastName, string $phone)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }


}