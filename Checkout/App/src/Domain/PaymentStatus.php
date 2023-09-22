<?php

namespace App\Domain;


class PaymentStatus
{
    public function __construct(
        private string $paymentStatus
    ) {
    }

    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }
}
