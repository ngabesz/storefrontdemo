<?php

namespace App\Domain\Order;

use App\Domain\Billing\BillingAddress;
use App\Domain\Billing\BillingMethod;
use App\Domain\Checkout\Checkout;
use App\Domain\Customer\Customer;
use App\Domain\Shipping\ShippingAddress;
use App\Domain\Shipping\ShippingMethod;

class OrderFactory
{


    public function __construct(
            private OrderIdProviderInterface $orderIdProvider
    ) {
    }

    public function createOrderFromCheckout(Checkout $checkout): Order
    {
        $orderId = $this->orderIdProvider->getNewOrderId();
        $customer = new Customer($checkout->getEmail());
        $shippingAddress = new ShippingAddress();
        $billingAddress = new BillingAddress();
        $shippingMethod = new ShippingMethod();
        $billingMethod = new BillingMethod();

        return new Order(
                $orderId,
                $customer,
                $shippingAddress,
                $shippingMethod,
                $billingAddress,
                $billingMethod
        );
    }
}
