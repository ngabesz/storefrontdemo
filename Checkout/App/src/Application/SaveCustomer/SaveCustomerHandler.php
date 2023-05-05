<?php

namespace App\Application\SaveCustomer;

use App\Application\Exception\ApplicationException;
use App\Domain\CheckoutRepositoryInterface;
use App\Domain\Customer;
use App\Domain\Shared\EntityId;
use App\Domain\Shared\EntityIdGeneratorInterface;

class SaveCustomerHandler
{
    public function __construct(
        private CheckoutRepositoryInterface $checkoutRepository,
        private EntityIdGeneratorInterface $entityIdGenerator
    ){}

    public function __invoke(SaveCustomerCommand $command)
    {
        $checkout = $this->checkoutRepository->findCheckout(new EntityId($command->checkoutId));
        if ($checkout === null) {
            throw new ApplicationException('checkout not found');
        }
        $customer = new Customer(
            $this->entityIdGenerator->generate(),
            $command->email,
            $command->lastName,
            $command->firstName,
            $command->phone
        );
        $checkout->setCustomer($customer);
        $this->checkoutRepository->updateCheckout($checkout);
        return $checkout;
    }
}