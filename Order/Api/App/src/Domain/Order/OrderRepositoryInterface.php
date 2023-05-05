<?php

namespace App\Domain\Order;

use App\Domain\Cart;
use App\Domain\Order\Specification\OrderSpecification;

interface OrderRepositoryInterface
{
    public function add(Order $order);

    /**
     * @return Cart[]
     */
    public function query(OrderSpecification $orderSpecification): array;
}
