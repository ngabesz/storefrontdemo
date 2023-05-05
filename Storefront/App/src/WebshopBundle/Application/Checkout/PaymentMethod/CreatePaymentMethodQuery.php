<?php

namespace App\WebshopBundle\Application\Checkout\PaymentMethod;

use App\WebshopBundle\Domain\Model\Checkout\Dto\PaymentMethod;

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
        return $this->paymentMethodid;
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }

}
