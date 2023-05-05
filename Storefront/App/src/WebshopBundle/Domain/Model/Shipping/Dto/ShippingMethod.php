<?php

namespace App\WebshopBundle\Domain\Model\Shipping\Dto;

class ShippingMethod
{
    private string $id;
    private bool $isEnabled;
    private string $name;
    private string $description;
    /**
     * @var ShippingLane[] $shippingLane
     */
    private array $shippingLane;

    public function __construct(string $id, bool $isEnabled, string $name, string $description, array $shippingLane)
    {
        $this->id = $id;
        $this->isEnabled = $isEnabled;
        $this->name = $name;
        $this->description = $description;
        $this->shippingLane = $shippingLane;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getShippingLane(): array
    {
        return $this->shippingLane;
    }



}