<?php

namespace App\Infrastructure\Persistence\InMemory\Repository;

use App\Domain\ShippingLane;
use App\Domain\ShippingMethod;
use App\Domain\ShippingMethodRepositoryInterface;

class InMemoryShippingMethodRepository
{
    public function fetchShippingMethods(float $getCartTotal): array
    {
        return [
            new ShippingMethod(
                "asdasd",
                "Teszt method 1",
                "Teszt method desc 1",
                true,
                [
                    new ShippingLane(
                        0,
                        10000,
                        2000
                    )
                ]
            ),
            new ShippingMethod(
                "asdasd1",
                "Teszt method 2",
                "Teszt method desc 2",
                true,
                [
                    new ShippingLane(
                        0,
                        10000,
                        2000
                    )
                ]
            ),
            new ShippingMethod(
                "asdasd2",
                "Teszt method 3",
                "Teszt method desc 3",
                true,
                [
                    new ShippingLane(
                        0,
                        10000,
                        2000
                    )
                ]
            ),
            new ShippingMethod(
                "asdasd3",
                "Teszt method 4",
                "Teszt method desc 4",
                true,
                [
                    new ShippingLane(
                        0,
                        10000,
                        2000
                    )
                ]
            )
        ];
    }

    public function getShippingMethodById(string $shippingMethodId): ShippingMethod
    {
        return new ShippingMethod(
            $shippingMethodId,
            "Teszt method",
            "Id alapján lekérve",
            true,
            [
                new ShippingLane(
                    0,
                    10000,
                    2000
                )
            ]
        );
    }
}