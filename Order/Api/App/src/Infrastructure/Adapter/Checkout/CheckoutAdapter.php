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
        $rawCheckout = $this->client->get($checkoutId);
        $rawCustomer = $rawCheckout['customer'];
        $rawShippingAddress = $rawCheckout['shippingAddress'];
        $rawBillingAddress = $rawCheckout['billingAddress'];
        $rawShippingMethod = $rawCheckout['shippingMethod'];
        $rawPaymentMethod = $rawCheckout['paymentMethod'];
        $rawCart = $rawCheckout['cart'];

        // mock ---------
//        $checkoutId = 'Asd';
//        $status = 'COMPLETED';
//        $customer = new Customer('easd@gmail.com', 'lastname', 'firstname', 'phone');
//        $shippingAddress = new ShippingAddress('address', 'city', 'postcode', 'country');
//        $billingAddress = new BillingAddress('address', 'city', 'postcode', 'country');
//        $shippingMethod = new ShippingMethod('shippingmethodid', 'shippingmethodname', 123);
//        $paymentMethod = new PaymentMethod('paymentmethodid', 'paymentmethodname', 123);
        // mock ---------

        $checkoutId = $rawCheckout['checkoutId'];
        $status = $rawCheckout['status'];
        $customer = new Customer(
                $rawCustomer['email'],
                $rawCustomer['lastName'],
                $rawCustomer['firstName'],
                $rawCustomer['phone']
        );
        $shippingAddress = new ShippingAddress(
                $rawShippingAddress['address'],
                $rawShippingAddress['city'],
                $rawShippingAddress['postcode'],
                $rawShippingAddress['country']
        );
        $billingAddress = new BillingAddress(
                $rawBillingAddress['address'],
                $rawBillingAddress['city'],
                $rawBillingAddress['postcode'],
                $rawBillingAddress['country']
        );
        $shippingMethod = new ShippingMethod(
                $rawShippingMethod['shippingMethodId'],
                $rawShippingMethod['shippingMethodName'],
                $rawShippingMethod['shippingFee']
        );
        $paymentMethod = new PaymentMethod(
                $rawPaymentMethod['paymentMethodId'],
                $rawPaymentMethod['paymentMethodName'],
                $rawPaymentMethod['paymentFee']
        );

        $items = [];

        foreach ($rawCart['items'] as $item) {
            $items[] = new CartItem(
                    $item['id'],
                    $item['sku'],
                    $item['name'],
                    $item['quantity'],
                    $item['price'],
                    $item['total']
            );
        }

        $cart = new Cart($rawCart['cartId'], $items, $rawCart['total']);

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
