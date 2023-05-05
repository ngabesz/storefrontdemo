<?php

namespace App\Application\SaveBillingAddress;

use App\Application\Exception\ApplicationException;
use App\Application\SaveBillingAddress\SaveBillingAddressCommand;
use App\Domain\CheckoutRepositoryInterface;
use App\Domain\Shared\EntityId;
use App\Domain\Shared\EntityIdGeneratorInterface;
use App\Domain\BillingAddress;

class SaveBillingAddressHandler
{
    public function __construct(
        private CheckoutRepositoryInterface $checkoutRepository,
        private EntityIdGeneratorInterface $entityIdGenerator
    ){}

    public function __invoke(SaveBillingAddressCommand $command)
    {
        $checkout = $this->checkoutRepository->findCheckout(new EntityId($command->checkoutId));
        if ($checkout === null) {
            throw new ApplicationException('checkout not found');
        }
        $billingAddress = new BillingAddress(
            $this->entityIdGenerator->generate(),
            $command->address,
            $command->country,
            $command->postcode,
            $command->city
        );
        $checkout->setBillingAddress($billingAddress);
        $this->checkoutRepository->updateCheckout($checkout);
        return $checkout;
    }
}
