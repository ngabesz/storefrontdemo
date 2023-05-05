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

    public function setCheckoutId(EntityId $checkoutId): void
    {
        $this->checkoutId = $checkoutId;
    }

    public function getCheckoutStatus(): CheckoutStatus
    {
        return $this->checkoutStatus;
    }

    public function setCheckoutStatus(CheckoutStatus $checkoutStatus): void
    {
        $this->checkoutStatus = $checkoutStatus;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function getShippingAddress(): Address
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(Address $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    public function getBillingAddress(): Address
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(Address $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    public function getShippingMethod(): ShippingMethod
    {
        return $this->shippingMethod;
    }

    public function setShippingMethod(ShippingMethod $shippingMethod): void
    {
        $this->shippingMethod = $shippingMethod;
    }

    public function getPaymentMethod(): PaymentMethod
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(PaymentMethod $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getCheckoutTotal(): CheckoutTotal
    {
        return $this->checkoutTotal;
    }

    public function setCheckoutTotal(CheckoutTotal $checkoutTotal): void
    {
        $this->checkoutTotal = $checkoutTotal;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function setCart(Cart $cart): void
    {
        $this->cart = $cart;
    }


}