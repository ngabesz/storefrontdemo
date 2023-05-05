<?php

namespace App\Application\SaveShippingAddress;

use App\Application\Exception\ApplicationException;
use App\Application\SaveShippingAddress\SaveShippingAddressCommand;
use App\Domain\CheckoutRepositoryInterface;
use App\Domain\Shared\EntityId;
use App\Domain\Shared\EntityIdGeneratorInterface;
use App\Domain\ShippingAddress;

class SaveShippingAddressHandler
{

    public function __construct(
        private CheckoutRepositoryInterface $checkoutRepository,
        private EntityIdGeneratorInterface $entityIdGenerator
    ){}

    public function __invoke(SaveShippingAddressCommand $command)
    {
        $checkout = $this->checkoutRepository->findCheckout(new EntityId($command->checkoutId));
        if ($checkout === null) {
            throw new ApplicationException('checkout not found');
        }
        $shippingAddress = new ShippingAddress(
            $this->entityIdGenerator->generate(),
            $command->address,
            $command->country,
            $command->postcode,
            $command->city
        );
        $checkout->setShippingAddress($shippingAddress);
        $this->checkoutRepository->updateCheckout($checkout);
        return $checkout;
    }
}