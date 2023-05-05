<?php

namespace App\Application\CreateShippingMethod;

use App\Domain\ShippingLane;

class CreateShippingMethodCommand
{
    private string $name;

    private string $description;

    private array $shippingLanes;

    private bool $isEnabled;

    /**
     * @param string $name
     * @param string $description
     * @param array $shippingLanes
     * @param bool $isEnabled
     */
    public function __construct(string $name, string $description, array $shippingLanes, bool $isEnabled)
    {
        $this->name = $name;
        $this->description = $description;
        $this->shippingLanes = $shippingLanes;
        $this->isEnabled = $isEnabled;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getShippingLanes()
    {
        return $this->shippingLanes;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }
}
