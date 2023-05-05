<?php

namespace App\Application\Order\List;

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
        $orders = $this->orderRepository->query($specification);

        $responseArray = [];
        foreach ($orders as $order) {
            $products = [];
            foreach ($order->getProducts() as $product) {
                $products[] = [
                    'id' => $product->getId(),
                    'name' => $product->getName(),
                    'quantity' => $product->getQuantity(),
                    'grossPrice' => $product->getGrossPrice(),
                ];
            }
            $responseArray[] = [
                'id' => $order->getId(),
                'customer' => [
                    'id' => $order->getCustomer()->getId(),
                    'firstName' => $order->getCustomer()->getFirstName(),
                    'lastName' => $order->getCustomer()->getLastName(),
                    'email' => $order->getCustomer()->getEmail(),
                    'phoneNumber' => $order->getCustomer()->getPhoneNumber(),
                ],
                'shippingAddress' => [
                    'country' => $order->getShippingAddress()->getCountry(),
                    'zipCode' => $order->getShippingAddress()->getZipCode(),
                    'city' => $order->getShippingAddress()->getCity(),
                    'address' => $order->getShippingAddress()->getAddress(),
                ],
                'billingAddress' => [
                    'country' => $order->getBillingAddress()->getCountry(),
                    'zipCode' => $order->getBillingAddress()->getZipCode(),
                    'city' => $order->getBillingAddress()->getCity(),
                    'address' => $order->getBillingAddress()->getAddress(),
                ],
                'shippingMethod' => [
                    'id' => $order->getShippingMethod()->getId(),
                    'code' => $order->getShippingMethod()->getCode(),
                    'name' => $order->getShippingMethod()->getName(),
                    'grossPrice' => $order->getShippingMethod()->getGrossPrice(),
                ],
                'billingMethod' => [
                    'id' => $order->getBillingMethod()->getId(),
                    'code' => $order->getBillingMethod()->getCode(),
                    'name' => $order->getBillingMethod()->getName(),
                    'grossPrice' => $order->getBillingMethod()->getGrossPrice(),
                ],
                'products' => $products,
                'grossTotal' => $order->getTotal(),
            ];
        }
        return $responseArray;
    }
}
