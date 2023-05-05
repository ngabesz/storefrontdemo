<?php

namespace App\Domain\Api;

use App\Domain\PaymentMethod;

interface PaymentApiInterface
{
    public function getPaymentMethod(string $externalPaymentMethodId): PaymentMethod;
}