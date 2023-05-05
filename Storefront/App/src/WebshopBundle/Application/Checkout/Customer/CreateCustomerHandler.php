<?php

namespace App\WebshopBundle\Application\Checkout\Customer;

use App\WebshopBundle\Application\Checkout\CreateCheckout\CreateCheckoutQuery;
use App\WebshopBundle\Application\Checkout\CreateCheckout\Dto\CreateCheckoutOutput;
use App\WebshopBundle\Domain\Model\Checkout\CheckoutRepositoryInterface;

class CreateCustomerHandler
{
    private CheckoutRepositoryInterface $checkoutRepository;

    public function __construct(CheckoutRepositoryInterface $checkoutRepositoryInterface)
    {
        $this->checkoutRepository = $checkoutRepositoryInterface;
    }

    public function __invoke(CreateCustomerQuery $createCustomerQuery){
        return $this->checkoutRepository->addCustomer($createCustomerQuery->getCustomer());
    }
}