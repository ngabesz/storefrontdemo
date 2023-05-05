<?php

namespace App\Application\Order\List;

use App\Domain\Order\Order;
use App\Domain\Order\OrderRepositoryInterface;
use App\Domain\Order\Specification\OrderSpecificationFactory;

class ListOrderHandler
{
    public function __construct(
            private OrderRepositoryInterface $orderRepository,
            private OrderSpecificationFactory $orderSpecificationFactory
    ) {
    }

    public function __invoke(ListOrderFilteredQuery $query): array
    {
        $orderId = $query->getOrderId();
        $specification = $this->orderSpecificationFactory->createHasOrderIdentifier($orderId);

        return $this->orderRepository->query($specification);
    }
}
