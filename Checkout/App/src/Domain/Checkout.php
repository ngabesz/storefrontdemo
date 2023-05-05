<?php

namespace App\Domain;

use App\Domain\Shared\EntityId;
use App\Domain\CheckoutStatus;
use App\Domain\Customer;
use App\Domain\ShippingAddress;
use App\Domain\BillingAddress;
use App\Domain\ShippingMethod;
use App\Domain\PaymentMethod;
use App\Domain\Cart;

class Checkout
{
    public function __construct(
        private EntityId $checkoutId,
        private CheckoutStatus $checkoutStatus,
        private Cart $cart,
        private ?Customer $customer = null,
        private ?ShippingAddress $shippingAddress = null,
        private ?BillingAddress $billingAddress = null,
        private ?ShippingMethod $shippingMethod = null,
        private ?PaymentMethod $paymentMethod = null
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

    public function getShippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }

    public function getBillingAddress(): BillingAddress
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

    public function checkoutTotal(): CheckoutTotal
    {
        return $this->cart->getTotal() +
            ($this->shippingMethod->getShippingFee() ?? 0) +
            ($this->paymentMethod->getPaymentFee() ?? 0);
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * @param \App\Domain\CheckoutStatus $checkoutStatus
     */
    public function setCheckoutStatus(\App\Domain\CheckoutStatus $checkoutStatus): void
    {
        $this->checkoutStatus = $checkoutStatus;
    }

    /**
     * @param \App\Domain\Cart $cart
     */
    public function setCart(\App\Domain\Cart $cart): void
    {
        $this->cart = $cart;
    }

    /**
     * @param \App\Domain\Customer|null $customer
     */
    public function setCustomer(?\App\Domain\Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @param \App\Domain\ShippingAddress|null $shippingAddress
     */
    public function setShippingAddress(?\App\Domain\ShippingAddress $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @param \App\Domain\BillingAddress|null $billingAddress
     */
    public function setBillingAddress(?\App\Domain\BillingAddress $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @param \App\Domain\ShippingMethod|null $shippingMethod
     */
    public function setShippingMethod(?\App\Domain\ShippingMethod $shippingMethod): void
    {
        $this->shippingMethod = $shippingMethod;
    }

    /**
     * @param \App\Domain\PaymentMethod|null $paymentMethod
     */
    public function setPaymentMethod(?\App\Domain\PaymentMethod $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }
}