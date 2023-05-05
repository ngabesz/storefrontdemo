<?php

namespace App\Application\ConfirmCheckout;

use App\Domain\Checkout;
use App\Domain\CheckoutRepositoryInterface;
use App\Domain\CheckoutStatus;
use App\Domain\Shared\EntityId;
use App\Application\Exception\ApplicationException;

class ConfirmCheckoutHandler
{
    public function __construct(
        private CheckoutRepositoryInterface $checkoutRepository
    ) {}

    public function __invoke(ConfirmCheckoutCommand $command): Checkout
    {
        $checkout = $this->checkoutRepository->findCheckout(new EntityId($command->checkoutId));

        if ($checkout === null) {
            throw new ApplicationException('checkout not found');
        }

        $checkout->setCheckoutStatus(CheckoutStatus::Completed);
        $this->checkoutRepository->updateCheckout($checkout);

        return $checkout;
    }
}