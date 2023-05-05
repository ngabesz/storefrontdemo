<?php

namespace App\Domain\Order;

use App\Domain\Billing\BillingAddress;
use App\Domain\Billing\BillingMethod;
use App\Domain\Customer\Customer;
use App\Domain\Product\Product;
use App\Domain\Shipping\ShippingAddress;
use App\Domain\Shipping\ShippingMethod;

class Order
{
    private string $id;
    private Customer $customer;
    private ShippingAddress $shippingAddress;
    private ShippingMethod $shippingMethod;
    private BillingAddress $billingAddress;
    private BillingMethod $billingMethod;
    /** @var Product[] */
    private $products;

    public function __construct(
            string $id,
            Customer $customer,
            ShippingAddress $shippingAddress,
            ShippingMethod $shippingMethod,
            BillingAddress $billingAddress,
            BillingMethod $billingMethod,
    ) {
        $this->id = $id;
        $this->customer = $customer;
        $this->shippingAddress = $shippingAddress;
        $this->shippingMethod = $shippingMethod;
        $this->billingAddress = $billingAddress;
        $this->billingMethod = $billingMethod;
        $this->products = [];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getShippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }

    public function getShippingMethod(): ShippingMethod
    {
        return $this->shippingMethod;
    }

    public function getBillingAddress(): BillingAddress
    {
        return $this->billingAddress;
    }

    public function getBillingMethod(): BillingMethod
    {
        return $this->billingMethod;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function addProduct(Product $product): void
    {
        $product->setId($this->getId() . '_' . $product->getId());
        $this->products[] = $product;
        $product->setOrder($this);
    }

    public function getTotal(): float
    {
        $sumOfProductPrices = 0;
        foreach ($this->products as $product) {
            $sumOfProductPrices += $product->getGrossPrice() * $product->getQuantity();
        }

        return $sumOfProductPrices + $this->getShippingMethod()
                        ->getGrossPrice() + $this->getBillingMethod()->getGrossPrice();
    }
}
