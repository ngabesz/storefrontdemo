<?php

namespace App\Domain;

class CartItem
{
    public function __construct(
        private string $id,
        private string $sku,
        private string $name,
        private int $quantity,
        private float $price,
        private float $total
    ) {
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

    public function getQuantity(): int
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
