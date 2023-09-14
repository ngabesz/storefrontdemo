<?php

namespace App\WebshopBundle\Application\Checkout\ShippingMethod;

use App\WebshopBundle\Application\Checkout\Customer\CreateCustomerCommand;
use App\WebshopBundle\Domain\Model\Checkout\CheckoutRepositoryInterface;

class CreateShippingMethodHandler
{
    private CheckoutRepositoryInterface $checkoutRepository;

    public function __construct(CheckoutRepositoryInterface $checkoutRepositoryInterface)
    {
        $this->checkoutRepository = $checkoutRepositoryInterface;
    }

    public function __invoke(CreateShippingMethodQuery $createShippingMethodQuery){
        return $this->checkoutRepository->addShippingMethod(
            $createShippingMethodQuery->getCheckoutId(),
            $createShippingMethodQuery->getShippingMethodId()
        );
    }
}
