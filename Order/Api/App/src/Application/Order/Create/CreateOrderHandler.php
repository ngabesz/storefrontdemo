<?php

use App\Domain\Checkout\CheckoutAdapterInterface;
use App\Domain\Order\OrderFactory;
use App\Domain\Order\OrderRepositoryInterface;
use Dto\OrderOutput;

class CreateOrderHandler
{
    public function __construct(
            private readonly OrderRepositoryInterface $orderRepository,
            private readonly CheckoutAdapterInterface $checkoutAdapter,
            private readonly OrderFactory $orderFactory
    ) {
    }

    public function __invoke(CreateOrderCommand $createOrderCommand): OrderOutput
    {
        $checkout = $this->checkoutAdapter->getCheckoutById($createOrderCommand->getCheckoutId());

        try {
            $order = $this->orderFactory->createOrderFromCheckout($checkout);
            $this->orderRepository->add($order);
        } catch (Throwable $throwable) {

        }

        return $orderOutput;
    }
}