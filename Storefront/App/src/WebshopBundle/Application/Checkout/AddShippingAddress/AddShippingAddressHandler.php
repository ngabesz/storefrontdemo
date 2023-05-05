<?php

namespace App\WebshopBundle\Application\Checkout\AddShippingAddress;

use App\WebshopBundle\Application\Checkout\AddShippingAddress\Dto\AddShippingAddressOutput;
use App\WebshopBundle\Domain\Model\Checkout\CheckoutRepositoryInterface;

class AddShippingAddressHandler
{

    private CheckoutRepositoryInterface $checkoutRepository;

    public function __construct(CheckoutRepositoryInterface $checkoutRepositoryInterface)
    {
        $this->checkoutRepository = $checkoutRepositoryInterface;
    }

    public function __invoke(AddShippingAddressCommand $addShippingAddressCommand)
    {
        $checkout = $this->checkoutRepository->addShippingAddress(
            $addShippingAddressCommand->getCheckoutId(),
            $addShippingAddressCommand->getAddress()
        );
        return new AddShippingAddressOutput($checkout->getShippingAddress());
    }
}
