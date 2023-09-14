<?php

namespace App\WebshopBundle\Application\Checkout\Customer;

use App\WebshopBundle\Domain\Model\Checkout\Dto\Customer;

class CreateCustomerCommand
{
    public function __construct(
        private string $checkoutId,
        private Customer $customer
    ) {
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}
