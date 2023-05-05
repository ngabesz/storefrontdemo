<?php

namespace App\Application\DeleteShippingMethod;

use App\Domain\ShippingMethodRepositoryInterface;

class DeleteShippingMethodHandler
{
    public function __construct(private ShippingMethodRepositoryInterface $shippingMethodRepository)
    {
    }

    public function __invoke(DeleteShippingMethodCommand $command): void
    {
        $this->shippingMethodRepository->deleteShippingMethod($command->getShippingMethodId());
    }
}