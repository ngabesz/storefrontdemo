<?php

namespace App\Domain;

class ShippingMethod
{
    /** @param ShippingLane[] $shippingLanes */
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly string $description,
        private readonly bool $isEnabled,
        private array $shippingLanes = []
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    /** @return ShippingLane[] */
    public function getShippingLanes(): array
    {
        return $this->shippingLanes;
    }

    public function addShippingLane(ShippingLane $shippingLane): void
    {
        $this->shippingLanes[] = $shippingLane;
    }
}
