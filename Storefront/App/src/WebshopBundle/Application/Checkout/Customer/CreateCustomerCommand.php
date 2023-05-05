<?php

namespace App\WebshopBundle\Application\Checkout\Customer;



use App\WebshopBundle\Domain\Model\Checkout\Dto\Customer;

class CreateCustomerCommand
{
    private Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
