<?php

namespace App\Domain;

use Doctrine\Common\Collections\ArrayCollection;

class ShippingMethod implements \JsonSerializable
{
    /**
     * @param string $id
     * @param string $name
     * @param string $description
     * @param bool $isEnabled
     */
    public function __construct(
       public string $id,
       public string $name,
       public string $description,
       public bool $isEnabled,
       public $shippingLanes = []
    ) {

    }

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
    public function getShippingLanes()
    {
        return $this->shippingLanes;
    }

    public function setShippingLanes($shippingLanes): void
    {
        $this->shippingLanes = $shippingLanes;
    }

    public function addShippingLane(ShippingLane $shippingLane): void
    {
        $this->shippingLanes[] = $shippingLane;
    }

    public function jsonSerialize(): mixed
    {
        $lanes = [];
        foreach ($this->getShippingLanes() as $shippingLane) {
            $lanes[] = [
                "minGrossPrice" => $shippingLane->getMinGrossPrice(),
                "maxGrossPrice" => $shippingLane->getMaxGrossPrice(),
                "cost" => $shippingLane->getCost(),
            ];
        }
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'isEnabled' => $this->isEnabled(),
            'shippingLanes' => $lanes,
        ];
    }
}
