<?php

namespace App\Domain\Order;

use App\Domain\Billing\BillingAddress;
use App\Domain\Billing\BillingMethod;
use App\Domain\Checkout\Checkout;
use App\Domain\Customer\Customer;
use App\Domain\Customer\CustomerIdProviderInterface;
use App\Domain\Customer\InvalidEmailException;
use App\Domain\Product\Product;
use App\Domain\Shipping\ShippingAddress;
use App\Domain\Shipping\ShippingMethod;

class OrderFactory
{

    public function __construct(
            private readonly OrderIdProviderInterface $orderIdProvider,
            private readonly CustomerIdProviderInterface $customerIdProvider,
    ) {
    }

    /**
     * @throws InvalidEmailException
     */
    public function createOrderFromCheckout(Checkout $checkout): Order
    {
        $orderId = $this->orderIdProvider->getNewOrderId();
        $customer = new Customer(
                $this->customerIdProvider->getNewCustomerId(),
                $checkout->getCustomer()->getFirstName(),
                $checkout->getCustomer()->getLastName(),
                $checkout->getCustomer()->getEmail(),
                $checkout->getCustomer()->getPhone(),
        );
        $shippingAddress = new ShippingAddress(
                $checkout->getShippingAddress()->getCountry(),
                (int)$checkout->getShippingAddress()->getPostcode(),
                $checkout->getShippingAddress()->getCity(),
                $checkout->getShippingAddress()->getAddress(),
        );
        $billingAddress = new BillingAddress(
                $checkout->getBillingAddress()->getCountry(),
                (int)$checkout->getBillingAddress()->getPostcode(),
                $checkout->getBillingAddress()->getCity(),
                $checkout->getBillingAddress()->getAddress(),
        );
        $shippingMethod = new ShippingMethod(
                $checkout->getShippingMethod()->getShippingMethodId(),
                $checkout->getShippingMethod()->getShippingMethodName(),
                $checkout->getShippingMethod()->getShippingMethodId(),
                $checkout->getShippingMethod()->getShippingFee()
        );
        $billingMethod = new BillingMethod(
                $checkout->getPaymentMethod()->getPaymentMethodId(),
                $checkout->getPaymentMethod()->getPaymentMethodName(),
                $checkout->getPaymentMethod()->getPaymentMethodId(),
                $checkout->getPaymentMethod()->getPaymentFee()
        );

        $order = new Order(
                $orderId,
                $customer,
                $shippingAddress,
                $shippingMethod,
                $billingAddress,
                $billingMethod
        );

        foreach ($checkout->getCart()->getItems() as $checkoutItem) {
            $product = new Product(
                    $checkoutItem->getId(),
                    $checkoutItem->getName(),
                    $checkoutItem->getQuantity(),
                    $checkoutItem->getPrice()
            );
            $order->addProduct($product);
        }

        return $order;
    }
}
