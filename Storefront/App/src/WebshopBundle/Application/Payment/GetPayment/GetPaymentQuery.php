<?php

namespace App\WebshopBundle\Application\Payment\GetPayment;

class GetPaymentQuery
{
    private string $shippingId;

    public function __construct(string $shippingId)
    {
        $this->shippingId = $shippingId;
    }

    public function getShippingId(): float
    {
        return $this->shippingId;
    }
}