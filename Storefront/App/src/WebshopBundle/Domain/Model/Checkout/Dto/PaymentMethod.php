<?php

namespace App\WebshopBundle\Domain\Model\Checkout\Dto;

class PaymentMethod
{
    private string $paymentMethodId;
    private string $paymentMethodName;
    private float $paymentMethodFee;

    public function __construct(string $paymentMethodId, string $paymentMethodName, float $paymentMethodFee)
    {
        $this->paymentMethodId = $paymentMethodId;
        $this->paymentMethodName = $paymentMethodName;
        $this->paymentMethodFee = $paymentMethodFee;
    }

    public function getPaymentMethodId(): string
    {
        return $this->paymentMethodId;
    }

    public function getPaymentMethodName(): string
    {
        return $this->paymentMethodName;
    }

    public function getPaymentMethodFee(): float
    {
        return $this->paymentMethodFee;
    }
}