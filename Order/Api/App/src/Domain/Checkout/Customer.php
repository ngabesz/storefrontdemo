<?php

namespace App\Domain\Checkout;

class Customer
{
    private string $email;
    private string $lastName;
    private string $firstName;
    private string $phone;

    public function __construct(string $email, string $lastName, string $firstName, string $phone)
    {
        $this->email = $email;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->phone = $phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
