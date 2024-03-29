<?php

namespace App\Application\Order\List;

class ListOrderFilteredQuery
{
    private ?string $orderId;

    public function __construct(?string $orderId)
    {
        $this->orderId = $orderId;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }
}
