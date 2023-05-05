<?php

namespace App\Domain;

use App\Domain\CartItem;

class Cart
{
    public function __construct(
        private String $cartId,
        private CartItem $cartItem,
        private float $cartTotal
    ) {
    }

    public function getCartId(): string
    {
        return $this->cartId;
    }

    public function setCartId(string $cartId): void
    {
        $this->cartId = $cartId;
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
