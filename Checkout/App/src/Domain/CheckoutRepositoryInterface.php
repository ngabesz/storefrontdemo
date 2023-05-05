<?php

namespace App\Domain;

use App\Domain\Shared\EntityId;

interface CheckoutRepositoryInterface
{
    public function findCheckout(EntityId $entityId): ?Checkout;
    public function createCheckout(Checkout $checkout): void;

    public function updateCheckout(Checkout $checkout): void;
}