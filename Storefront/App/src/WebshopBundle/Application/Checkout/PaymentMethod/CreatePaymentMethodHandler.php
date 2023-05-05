<?php

namespace App\WebshopBundle\Application\Checkout\PaymentMethod;

use App\WebshopBundle\Domain\Model\Checkout\CheckoutRepositoryInterface;

class CreatePaymentMethodHandler
{
    private CheckoutRepositoryInterface $checkoutRepository;

    public function __construct(CheckoutRepositoryInterface $checkoutRepositoryInterface)
    {
        $this->checkoutRepository = $checkoutRepositoryInterface;
    }

    public function __invoke(CreatePaymentMethodQuery $createPaymentMethodQuery){
        return $this->checkoutRepository->addPaymentMethod($createPaymentMethodQuery->getPaymentMethod());
    }
}