<?php

namespace App\Infrastructure\Adapter\Checkout;

use App\Domain\Checkout\BillingAddress;
use App\Domain\Checkout\Cart;
use App\Domain\Checkout\CartItem;
use App\Domain\Checkout\Checkout;
use App\Domain\Checkout\CheckoutAdapterInterface;
use App\Domain\Checkout\Customer;
use App\Domain\Checkout\PaymentMethod;
use App\Domain\Checkout\ShippingAddress;
use App\Domain\Checkout\ShippingMethod;

class CheckoutAdapter implements CheckoutAdapterInterface
{

    private CheckoutHTTPClient $client;

    public function __construct(CheckoutHTTPClient $client)
    {
        $this->client = $client;
    }

    public function getCheckoutById(string $checkoutId): Checkout
    {
//        $rawCheckout = $this->client->getCheckoutById($checkoutId);

        $checkoutId = 'Asd';
        $status = 'COMPLETED';
        $customer = new Customer('easd@gmail.com', 'lastname', 'firstname', 'phone');
        $shippingAddress = new ShippingAddress('address', 'city', 'postcode', 'country');
        $billingAddress = new BillingAddress('address', 'city', 'postcode', 'country');
        $shippingMethod = new ShippingMethod('shippingmethodid', 'shippingmethodname', 123);
        $paymentMethod = new PaymentMethod('paymentmethodid', 'paymentmethodname', 123);

        $items = [
                new CartItem("b", "asd", "name", 2, 34, 54),
        ];
        $cart = new Cart('catrId', $items, 1234);

        return new Checkout(
                $checkoutId,
                $status,
                $customer,
                $shippingAddress,
                $billingAddress,
                $shippingMethod,
                $paymentMethod,
                $cart
        );
    }
}
