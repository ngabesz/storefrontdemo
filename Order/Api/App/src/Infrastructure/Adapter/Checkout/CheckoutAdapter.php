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

//        $checkoutId = 'Asd';
//        $status = 'COMPLETED';
//        $customer = new Customer('easd@gmail.com', 'lastname', 'firstname', 'phone');
//        $shippingAddress = new ShippingAddress('address', 'city', 'postcode', 'country');
//        $billingAddress = new BillingAddress('address', 'city', 'postcode', 'country');
//        $shippingMethod = new ShippingMethod('shippingmethodid', 'shippingmethodname', 123);
//        $paymentMethod = new PaymentMethod('paymentmethodid', 'paymentmethodname', 123);

        $checkoutId = $rawCheckout['checkoutId'];
        $status = $rawCheckout['status'];
        $customer = new Customer(
                $rawCheckout['customer']['email'],
                $rawCheckout['customer']['lastName'],
                $rawCheckout['customer']['firstName'],
                $rawCheckout['customer']['phone']
        );
        $shippingAddress = new ShippingAddress(
                $rawCheckout['shippingAddress']['address'],
                $rawCheckout['shippingAddress']['city'],
                $rawCheckout['shippingAddress']['postcode'],
                $rawCheckout['shippingAddress']['country']
        );
        $billingAddress = new BillingAddress(
                $rawCheckout['billingAddress']['address'],
                $rawCheckout['billingAddress']['city'],
                $rawCheckout['billingAddress']['postcode'],
                $rawCheckout['billingAddress']['country']
        );
        $shippingMethod = new ShippingMethod(
                $rawCheckout['shippingMethod']['shippingMethodId'],
                $rawCheckout['shippingMethod']['shippingMethodName'],
                $rawCheckout['shippingMethod']['shippingFee']
        );
        $paymentMethod = new PaymentMethod(
                $rawCheckout['paymentMethod']['paymentMethodId'],
                $rawCheckout['paymentMethod']['paymentMethodName'],
                $rawCheckout['paymentMethod']['paymentFee']
        );

        $items = [];

        foreach ($rawCheckout['cart']['items'] as $item) {
            $items[] = new CartItem(
                    $item['id'],
                    $item['sku'],
                    $item['name'],
                    $item['quantity'],
                    $item['price'],
                    $item['total']
            );
        }

        $cart = new Cart($rawCheckout['cart']['cartId'], $items, $rawCheckout['cart']['total']);

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
