<?php

namespace App\WebshopBundle\Domain\Model\Checkout;

use App\WebshopBundle\Domain\Model\Checkout\Dto\Address;
use App\WebshopBundle\Domain\Model\Checkout\Dto\CheckoutTotal;
use App\WebshopBundle\Domain\Model\Checkout\Dto\Customer;
use App\WebshopBundle\Domain\Model\Checkout\Dto\PaymentMethod;
use App\WebshopBundle\Domain\Model\Checkout\Dto\ShippingMethod;

class Checkout
{
    private string $id;
    private string $status;
    private Customer $customer;
    private Address $shippingAddress;
    private Address $paymentAddress;
    private ShippingMethod $shippingMethod;
    private PaymentMethod $paymentMethode;
    private CheckoutTotal $checkoutTotal;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
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

    public function getPaymentAddress(): Address
    {
        return $this->paymentAddress;
    }

    public function setPaymentAddress(Address $paymentAddress): void
    {
        $this->paymentAddress = $paymentAddress;
    }

    public function getShippingMethod(): ShippingMethod
    {
        return $this->shippingMethod;
    }

    public function setShippingMethod(ShippingMethod $shippingMethod): void
    {
        $this->shippingMethod = $shippingMethod;
    }

    public function getPaymentMethode(): PaymentMethod
    {
        return $this->paymentMethode;
    }

    public function setPaymentMethode(PaymentMethod $paymentMethode): void
    {
        $this->paymentMethode = $paymentMethode;
    }

    public function getCheckoutTotal(): CheckoutTotal
    {
        return $this->checkoutTotal;
    }

    public function setCheckoutTotal(CheckoutTotal $checkoutTotal): void
    {
        $this->checkoutTotal = $checkoutTotal;
    }
}
