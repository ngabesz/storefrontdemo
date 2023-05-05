<?php

namespace App\Domain\Checkout;

class PaymentMethod
{
    private string $paymentMethodId;
    private string $paymentMethodName;
    private float $paymentFee;

    public function __construct(string $paymentMethodId, string $paymentMethodName, float $paymentFee)
    {
        $this->paymentMethodId = $paymentMethodId;
        $this->paymentMethodName = $paymentMethodName;
        $this->paymentFee = $paymentFee;
    }

    public function getPaymentMethodId(): string
    {
        return $this->paymentMethodId;
    }

    public function getPaymentMethodName(): string
    {
        return $this->paymentMethodName;
    }

    public function getPaymentFee(): float
    {
        return $this->paymentFee;
    }
}
