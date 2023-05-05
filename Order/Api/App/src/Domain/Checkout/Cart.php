<?php

namespace App\Domain\Checkout;

class Cart
{
    private string $cartId;
    /** @var CartItem[] */
    private array $items;
    private float $total;

    /**
     * @param CartItem[] $items
     */
    public function __construct(string $cartId, array $items, float $total)
    {
        $this->cartId = $cartId;
        $this->items = $items;
        $this->total = $total;
    }

    public function getCartId(): string
    {
        return $this->cartId;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}
