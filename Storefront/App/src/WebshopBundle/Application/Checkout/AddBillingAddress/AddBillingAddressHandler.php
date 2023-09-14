<?php

namespace App\WebshopBundle\Application\Checkout\AddBillingAddress;

use App\WebshopBundle\Application\Checkout\AddShippingAddress\Dto\AddBillingAddressOutput;
use App\WebshopBundle\Domain\Model\Checkout\CheckoutRepositoryInterface;

class AddBillingAddressHandler
{

    private CheckoutRepositoryInterface $checkoutRepository;

    public function __construct(CheckoutRepositoryInterface $checkoutRepositoryInterface)
    {
        $this->checkoutRepository = $checkoutRepositoryInterface;
    }

    public function __invoke(AddBillingAddressCommand $addShippingAddressCommand)
    {
        $checkout = $this->checkoutRepository->addShippingAddress(
            $addShippingAddressCommand->getCheckoutId(),
            $addShippingAddressCommand->getAddress()
        );
        return new AddBillingAddressOutput($checkout->getShippingAddress());
    }
}
