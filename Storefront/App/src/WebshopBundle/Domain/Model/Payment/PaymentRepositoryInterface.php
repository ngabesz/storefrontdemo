<?php

namespace App\WebshopBundle\Domain\Model\Payment;

interface PaymentRepositoryInterface
{
    public function getPaymentMethodsByShippingMethod(string $shippingMethod): Payment;
}