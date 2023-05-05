<?php

namespace App\Domain;

use App\Domain\CartItem;
use App\Domain\Shared\EntityId;

class Cart
{
    public function __construct(
        private EntityId $cartId,
        private string $externalCartId,
        private CartItem $cartItem,
        private float $cartTotal
    ) {
    }

    public function getCartId(): EntityId
    {
        return $this->cartId;
    }

    public function setCartId(EntityId $cartId): void
    {
        $this->cartId = $cartId;
    }

    public function getExternalCartId(): string
    {
        return $this->externalCartId;
    }

    public function setExternalCartId(string $externalCartId): void
    {
        $this->externalCartId = $externalCartId;
    }

    public function getCartItem(): CartItem
    {
        return $this->cartItem;
    }

    public function setCartItem(CartItem $cartItem): void
    {
        $this->cartItem = $cartItem;
    }

    public function getCartTotal(): float
    {
        return $this->cartTotal;
    }

    public function setCartTotal(float $cartTotal): void
    {
        $this->cartTotal = $cartTotal;
    }
}
