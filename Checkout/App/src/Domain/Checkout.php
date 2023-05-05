<?php

namespace App\Domain;

use App\Domain\Shared\EntityId;
use App\Domain\CheckoutStatus;
use App\Domain\Customer;
use App\Domain\Address;
use App\Domain\ShippingMethod;
use App\Domain\PaymentMethod;
use App\Domain\Cart;

class Checkout
{
    public function __construct(
        private EntityId $checkoutId,
        private CheckoutStatus $checkoutStatus,
        private Customer $customer,
        private Address $shippingAddress,
        private Address $billingAddress,
        private ShippingMethod $shippingMethod,
        private PaymentMethod $paymentMethod,
        private CheckoutTotal $checkoutTotal,
        private Cart $cart
    ) {
    }

    public function getCheckoutId(): EntityId
    {
        return $this->checkoutId;
    }

    public function getCheckoutStatus(): CheckoutStatus
    {
        return $this->checkoutStatus;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getShippingAddress(): Address
    {
        return $this->shippingAddress;
    }

    public function getBillingAddress(): Address
    {
        return $this->billingAddress;
    }

    public function getShippingMethod(): ShippingMethod
    {
        return $this->shippingMethod;
    }

    public function getPaymentMethod(): PaymentMethod
    {
        return $this->paymentMethod;
    }

    public function getCheckoutTotal(): CheckoutTotal
    {
        return $this->checkoutTotal;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

}