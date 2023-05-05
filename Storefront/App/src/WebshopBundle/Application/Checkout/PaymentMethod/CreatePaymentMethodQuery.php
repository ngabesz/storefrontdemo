<?php

namespace App\WebshopBundle\Application\Checkout\PaymentMethod;

use App\WebshopBundle\Domain\Model\Checkout\Dto\PaymentMethod;

class CreatePaymentMethodQuery
{
    private PaymentMethod $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getPaymentMethod(): PaymentMethod
    {
        return $this->paymentMethod;
    }

}