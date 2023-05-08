<?php

namespace App\WebshopBundle\Domain\Model\Checkout;

use App\WebshopBundle\Domain\Exception\DomainException;
use App\WebshopBundle\Domain\Model\Checkout\Dto\Address;
use App\WebshopBundle\Domain\Model\Checkout\Dto\CheckoutTotal;
use App\WebshopBundle\Domain\Model\Checkout\Dto\Customer;
use App\WebshopBundle\Domain\Model\Checkout\Dto\PaymentMethod;
use App\WebshopBundle\Domain\Model\Checkout\Dto\ShippingMethod;

interface CheckoutRepositoryInterface
{
    public function createCheckout(string $cartId): Checkout;
    public function addCustomer(Customer $customer): Checkout;
    public function addShippingAddress(string $checkoutId, Address $address): Checkout;
    public function addPaymentAddress(Address $address): Checkout;
    public function addShippingMethod(ShippingMethod $shippingMethod): Checkout;
    public function addPaymentMethod(string $checkoutId, string $paymentMethodId): Checkout;

    /**
     * @throws DomainException
     */
    public function confirmCheckout(string $checkoutId): Checkout;
    public function addCheckoutTotal(CheckoutTotal $checkoutTotal): Checkout;

    /**
     * @throws DomainException
     */
    public function getCheckout(string $checkoutId): ?Checkout;

}
