<?php

namespace App\Domain;

use Doctrine\Common\Collections\ArrayCollection;

class ShippingMethod
{
    /** @param ShippingLane[] $shippingLanes */
    public function __construct(
       public string $id,
       public string $name,
       public string $description,
       public bool $isEnabled,
       public ArrayCollection $shippingLanes = new ArrayCollection()
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
