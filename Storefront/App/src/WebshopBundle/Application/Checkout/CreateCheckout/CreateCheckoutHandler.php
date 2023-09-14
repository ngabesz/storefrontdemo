<?php

namespace App\WebshopBundle\Application\Checkout\CreateCheckout;

use App\WebshopBundle\Application\Checkout\CreateCheckout\Dto\CreateCheckoutOutput;
use App\WebshopBundle\Domain\Model\Checkout\CheckoutRepositoryInterface;

class CreateCheckoutHandler
{
    private CheckoutRepositoryInterface $checkoutRepository;

    public function __construct(CheckoutRepositoryInterface $checkoutRepositoryInterface)
    {
        $this->checkoutRepository = $checkoutRepositoryInterface;
    }

    public function __invoke(CreateCheckoutQuery $createCheckoutQuery): CreateCheckoutOutput
    {
        $checkout = $this->checkoutRepository->createCheckout($createCheckoutQuery->getCartId());
        return new CreateCheckoutOutput($checkout->getId());
    }
}
