<?php

namespace App\Infrastructure\Provider;

use App\Domain\Order\OrderIdProviderInterface;
use Symfony\Component\Uid\Uuid;

class OrderIdProvider implements OrderIdProviderInterface
{
    public function getNewOrderId(): string
    {
        return Uuid::v4();
    }
}
