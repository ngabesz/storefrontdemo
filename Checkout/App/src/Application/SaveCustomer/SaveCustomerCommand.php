<?php

namespace App\Application\SaveCustomer;

class SaveCustomerCommand
{
    public function __construct(
        public readonly string $email,
        public readonly string $lastName,
        public readonly string $firstName,
        public readonly string $phone
    ){}
}