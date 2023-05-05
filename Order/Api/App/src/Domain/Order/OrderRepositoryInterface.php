<?php

namespace App\Domain\Order;

use App\Domain\Order\Specification\OrderSpecification;

interface OrderRepositoryInterface
{
    public function add(Order $order): Order;

    /**
     * @return Order[]
     */
    public function query(OrderSpecification $orderSpecification): array;
}
