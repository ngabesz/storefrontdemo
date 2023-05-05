<?php

namespace App\Domain\Checkout;

class CartItem
{
    private string $id;
    private string $sku;
    private string $name;
    private float $quantity;
    private float $price;
    private float $total;

    public function __construct(string $id, string $sku, string $name, float $quantity, float $price, float $total)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->total = $total;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

}
