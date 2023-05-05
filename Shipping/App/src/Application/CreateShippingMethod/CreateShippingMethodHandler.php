<?php

namespace App\Application\CreateShippingMethod;

use App\Domain\ShippingLane;
use App\Domain\ShippingMethod;
use App\Domain\ShippingMethodRepositoryInterface;
use Ramsey\Uuid\Uuid;

class CreateShippingMethodHandler
{
    public function __construct(private ShippingMethodRepositoryInterface $shippingMethodRepository)
    {
    }

    public function __invoke(CreateShippingMethodCommand $command): ShippingMethod
    {
        $shippingMethod = new ShippingMethod(
            Uuid::uuid4(),
            $command->getName(),
            $command->getDescription(),
            $command->isEnabled()
        );

        $shippingLanes = [];

        foreach ($command->getShippingLanes() as $shippingLane) {
            $shippingLanes[] = new ShippingLane(
                Uuid::uuid4(),
                $shippingMethod,
                $shippingLane["minGrossPrice"],
                $shippingLane["maxGrossPrice"],
                $shippingLane["cost"]
            );
        }

        $shippingMethod->setShippingLanes($shippingLanes);

        $this->shippingMethodRepository->createShippingMethod($shippingMethod);

        return $shippingMethod;
    }
}