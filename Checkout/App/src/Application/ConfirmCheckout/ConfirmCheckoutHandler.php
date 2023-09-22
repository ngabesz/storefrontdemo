<?php

namespace App\Application\ConfirmCheckout;

use App\Domain\Api\OrderApiInterface;
use App\Domain\Api\PaymentApiInterface;
use App\Domain\Checkout;
use App\Domain\CheckoutRepositoryInterface;
use App\Domain\CheckoutStatus;
use App\Domain\Shared\EntityId;
use App\Application\Exception\ApplicationException;

class ConfirmCheckoutHandler
{
    public function __construct(
        private readonly CheckoutRepositoryInterface $checkoutRepository,
        private readonly PaymentApiInterface $paymentApi,
        private readonly OrderApiInterface $orderApi,
    ) {}

    /**
     * @param ConfirmCheckoutCommand $command
     * @return Checkout
     * @throws ApplicationException
     */
    public function __invoke(ConfirmCheckoutCommand $command): Checkout
    {
        $checkout = $this->checkoutRepository->findCheckout(new EntityId($command->checkoutId));

        if ($checkout === null) {
            throw new ApplicationException('checkout not found');
        }

        $paymentStatus = $this->paymentApi->createPaymentMethod($command->checkoutId, $checkout->getCustomer(), $checkout->getCart()->getCartTotal());

        if (strtoupper($paymentStatus->getPaymentStatus()) !== 'SUCCESS') {
            throw new ApplicationException(sprintf(
                'payment status is not SUCCESS. Current status is: %s',
                strtoupper($paymentStatus->getPaymentStatus())
            ));
        }

        $checkout->setCheckoutStatus(CheckoutStatus::Completed);
        $this->checkoutRepository->updateCheckout($checkout);

        $this->orderApi->createOrder($command->checkoutId);


        return $checkout;
    }
}
