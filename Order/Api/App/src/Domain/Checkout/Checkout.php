<?php

namespace App\Domain\Checkout;

class Checkout
{
    private string $checkoutId;
    private string $status;
    private Customer $customer;
    private ShippingAddress $shippingAddress;
    private BillingAddress $billingAddress;
    private ShippingMethod $shippingMethod;
    private PaymentMethod $paymentMethod;
    private Cart $cart;

    public function __construct(
        string $checkoutId,
        string $status,
        Customer $customer,
        ShippingAddress $shippingAddress,
        BillingAddress $billingAddress,
        ShippingMethod $shippingMethod,
        PaymentMethod $paymentMethod,
        Cart $cart
    ) {
        $this->checkoutId = $checkoutId;
        $this->status = $status;
        $this->customer = $customer;
        $this->shippingAddress = $shippingAddress;
        $this->billingAddress = $billingAddress;
        $this->shippingMethod = $shippingMethod;
        $this->paymentMethod = $paymentMethod;
        $this->cart = $cart;
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }

    public function getStatus(): string
    {
        return $this->status;
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

    public function getCart(): Cart
    {
        return $this->cart;
    }
}
