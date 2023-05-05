<?php

namespace App\Domain;

use App\Domain\Shared\EntityId;

class Customer
{
    public function __construct(
        private EntityId $customerId,
        private string $email,
        private string $lastName,
        private string $firstName,
        private string $phone
    ) {
    }

    /**
     * @return EntityId
     */
    public function getCustomerId(): EntityId
    {
        return $this->customerId;
    }



    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
}
