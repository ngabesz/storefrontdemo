<?php

namespace App\Domain;

class Customer
{
    private string $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $phoneNumber;

    /**
     * @param string $id
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phoneNumber
     */
    public function __construct(string $id, string $firstName, string $lastName, string $email, string $phoneNumber)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
    public function getLastName(): string
    {
        return $this->lastName;
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
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

}
