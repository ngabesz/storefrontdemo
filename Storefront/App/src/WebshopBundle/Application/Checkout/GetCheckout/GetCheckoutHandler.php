<?php

namespace App\WebshopBundle\Application\Checkout\GetCheckout;

use App\WebshopBundle\Application\Checkout\GetCheckout\Dto\GetCheckoutOutput;
use App\WebshopBundle\Domain\Model\Checkout\CheckoutRepositoryInterface;

class GetCheckoutHandler
{
    private CheckoutRepositoryInterface $checkoutRepository;

    public function __construct(CheckoutRepositoryInterface $checkoutRepositoryInterface)
    {
        $this->checkoutRepository = $checkoutRepositoryInterface;
    }

    public function __invoke(GetCheckoutQuery $getCheckoutQuery){
        $checkout = $this->checkoutRepository->getCheckout($getCheckoutQuery->getCheckoutId());
        return new GetCheckoutOutput($checkout);
    }
}