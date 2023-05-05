<?php

namespace App\Domain\Order;

interface OrderIdProviderInterface
{
    public function getNewOrderId(): string;
}
