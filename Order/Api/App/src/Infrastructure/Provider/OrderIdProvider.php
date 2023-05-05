<?php

namespace App\Infrastructure\Provider;

use App\Domain\Order\OrderIdProviderInterface;

class OrderIdProvider implements OrderIdProviderInterface
{
    public function getNewOrderId(): string
    {
        return uniqid();
    }
}
