<?php

namespace App\WebshopBundle\Application\Checkout\GetCheckout\Dto;

use App\WebshopBundle\Domain\Model\Checkout\Checkout;

class GetCheckoutOutput
{
    private Checkout $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

    public function getCheckout(): Checkout
    {
        return $this->checkout;
    }

}