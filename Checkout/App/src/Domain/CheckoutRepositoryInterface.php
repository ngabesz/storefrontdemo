<?php

namespace App\Domain;

interface CheckoutRepositoryInterface
{
    public function createCheckout(Checkout $checkout): void;
}