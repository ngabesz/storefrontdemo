<?php

namespace App\Domain;

use App\Domain\Shared\EntityId;
use JsonSerializable;

class CartItem implements JsonSerializable
{
    public function __construct(
        private EntityId $cartItemId,
        private string $externalId,
        private string $sku,
        private string $name,
        private int $quantity,
        private float $price,
        private float $total,
        private Cart $cart
    ) {
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

    public function getCartItemId(): EntityId
    {
        return $this->cartItemId;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * @return Cart
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'cartItemId' => $this->cartItemId,
            'externalId' => $this->externalId,
            'sku' => $this->sku,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->total,
            'cart' => null,
        ];
    }
}
