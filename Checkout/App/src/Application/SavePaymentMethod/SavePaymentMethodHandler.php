<?php

namespace App\Application\SavePaymentMethod;


use App\Application\Exception\ApplicationException;
use App\Application\SavePaymentMethod\SavePaymentMethodCommand;
use App\Domain\Api\PaymentApiInterface;
use App\Domain\Checkout;
use App\Domain\CheckoutRepositoryInterface;
use App\Domain\Shared\EntityId;

class SavePaymentMethodHandler
{
    public function __construct(
        private CheckoutRepositoryInterface $checkoutRepository,
        private PaymentApiInterface $shippingApi
    ){}

    public function __invoke(SavePaymentMethodCommand $command): Checkout
    {
        $checkout = $this->checkoutRepository->findCheckout(new EntityId($command->checkoutId));
        if ($checkout === null) {
            throw new ApplicationException('checkout not found');
        }

        $paymentMethod = $this->shippingApi->getPaymentMethod($command->externalPaymentMethodId);

        $checkout->setPaymentMethod($paymentMethod);
        $this->checkoutRepository->updateCheckout($checkout);
        return $checkout;
    }
}
