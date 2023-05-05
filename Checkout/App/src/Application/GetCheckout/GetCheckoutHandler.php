<?php

namespace App\Application\GetCheckout;

use App\Application\Exception\ApplicationException;
use App\Domain\CheckoutRepositoryInterface;
use App\Domain\Shared\EntityId;

class GetCheckoutHandler
{
    public function __construct(
        private CheckoutRepositoryInterface $checkoutRepository
    ){}

    public function __invoke(GetCheckoutQuery $query)
    {
        $checkout = $this->checkoutRepository->findCheckout(new EntityId($query->checkoutId));
        if ($checkout === null) {
            throw new ApplicationException('checkout not found');
        }
        return $checkout;
    }
}
