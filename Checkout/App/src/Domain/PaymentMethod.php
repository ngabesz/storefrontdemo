<?php

namespace App\Domain;

use App\Domain\Shared\EntityId;

class PaymentMethod
{
    public function __construct(
        private EntityId $paymentMethodId,
        private string $externalPaymentMethodId,
        private string $paymentMethodName,
        private float $paymentFee
    ) {
    }

    /**
     * @return EntityId
     */
    public function getPaymentMethodId(): EntityId
    {
        return $this->paymentMethodId;
    }

    /**
     * @return string
     */
    public function getExternalPaymentMethodId(): string
    {
        return $this->externalPaymentMethodId;
    }

    /**
     * @return string
     */
    public function getPaymentMethodName(): string
    {
        return $this->paymentMethodName;
    }

    /**
     * @return float
     */
    public function getPaymentFee(): float
    {
        return $this->paymentFee;
    }
}
