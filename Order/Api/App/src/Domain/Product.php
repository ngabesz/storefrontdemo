<?php

namespace App\Domain;

class Product
{
    private string $id;
    private string $name;
    private float $quantity;
    private float $grossPrice;
    private Order $order;

    public function __construct(string $id, string $name, float $quantity, float $grossPrice)
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->grossPrice = $grossPrice;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function getGrossPrice(): float
    {
        return $this->grossPrice;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }
}
