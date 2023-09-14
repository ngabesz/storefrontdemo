<?php

namespace App\WebshopBundle\Application\Checkout\PaymentMethod;

class CreatePaymentMethodQuery
{
    private string $checkoutId;
    private string $paymentMethodId;

    public function __construct(string $checkoutId, string $paymentMethodId)
    {
        $this->paymentMethodId = $paymentMethodId;
        $this->checkoutId = $checkoutId;
    }

    public function getPaymentMethodId(): string
    {
        return $this->paymentMethodId;
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }

}
