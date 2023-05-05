<?php

namespace App\Domain;

use App\Domain\CartItem;
use App\Domain\Shared\EntityId;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

class Cart
{
    public function __construct(
        private EntityId $cartId,
        private string $externalCartId,
        private float $cartTotal,
        private Collection $cartItems = new ArrayCollection(),
    ) {
    }

    public function getCartId(): EntityId
    {
        return $this->cartId;
    }

    public function getExternalCartId(): string
    {
        return $this->externalCartId;
    }

    public function getCartItems(): array
    {
        return $this->cartItems->toArray();
    }

    public function addCartItem(CartItem $cartItem)
    {
        $this->cartItems->add($cartItem);
    }

    public function getCartTotal(): float
    {
        return $this->cartTotal;
    }

}
