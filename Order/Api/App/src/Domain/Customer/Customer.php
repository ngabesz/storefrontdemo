<?php

namespace App\Domain\Customer;

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
     * @throws InvalidEmailException
     */
    public function __construct(string $id, string $firstName, string $lastName, string $email, string $phoneNumber)
    {
        $filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($filteredEmail) {
            $email = $filteredEmail;
        } else {
            throw new InvalidEmailException('Invalid email');
        }
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
