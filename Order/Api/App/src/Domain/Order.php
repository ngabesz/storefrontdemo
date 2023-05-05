<?php

namespace App\Domain;

class Order
{
    private string $id;
    private Customer $customer;
    private ShippingAddress $shippingAddress;
    private ShippingMethod $shippingMethod;
    private BillingAddress $billingAddress;
    private BillingMethod $billingMethod;

    /** @var Product[] */
    private array $products;

    private float $total;

    /**
     * @param string $id
     * @param Customer $customer
     * @param ShippingAddress $shippingAddress
     * @param ShippingMethod $shippingMethod
     * @param BillingAddress $billingAddress
     * @param BillingMethod $billingMethod
     * @param Product[] $products
     */
    public function __construct(
            string $id,
            Customer $customer,
            ShippingAddress $shippingAddress,
            ShippingMethod $shippingMethod,
            BillingAddress $billingAddress,
            BillingMethod $billingMethod,
            array $products
    ) {
        $this->id = $id;
        $this->customer = $customer;
        $this->shippingAddress = $shippingAddress;
        $this->shippingMethod = $shippingMethod;
        $this->billingAddress = $billingAddress;
        $this->billingMethod = $billingMethod;
        $this->products = $products;

        $this->total = 0;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }

    /**
     * @return ShippingMethod
     */
    public function getShippingMethod(): ShippingMethod
    {
        return $this->shippingMethod;
    }

    /**
     * @return BillingAddress
     */
    public function getBillingAddress(): BillingAddress
    {
        return $this->billingAddress;
    }

    /**
     * @return BillingMethod
     */
    public function getBillingMethod(): BillingMethod
    {
        return $this->billingMethod;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}
