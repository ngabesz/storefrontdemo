<?php

namespace App\WebshopBundle\Application\Checkout\ConfirmCheckout;

use App\Application\Exception\ApplicationException;
use App\WebshopBundle\Application\Checkout\ConfirmCheckout\Dto\ConfirmCheckoutOutput;
use App\WebshopBundle\Domain\Exception\DomainException;
use App\WebshopBundle\Domain\Model\Checkout\CheckoutRepositoryInterface;

class ConfirmCheckoutHandler
{

    public function __construct(CheckoutRepositoryInterface $checkoutRepositoryInterface)
    {
        $this->checkoutRepository = $checkoutRepositoryInterface;
    }

    public function __invoke(ConfirmCheckoutCommand $command): ConfirmCheckoutOutput
    {
        try {
            $checkout = $this->checkoutRepository->confirmCheckout($command->getCheckoutId());
        } catch (DomainException $e) {
            throw new ApplicationException($e->getMessage());
        }

        return new ConfirmCheckoutOutput($checkout);
    }
}