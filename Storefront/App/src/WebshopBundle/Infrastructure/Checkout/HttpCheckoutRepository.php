<?php


namespace App\WebshopBundle\Infrastructure\Checkout;

use App\WebshopBundle\Domain\Exception\DomainException;
use App\WebshopBundle\Domain\Model\Cart\Cart;
use App\WebshopBundle\Domain\Model\Cart\CartRepositoryInterface;
use App\WebshopBundle\Domain\Model\Cart\Dto\AddToCartInput;
use App\WebshopBundle\Domain\Model\Cart\ItemCollection;
use App\WebshopBundle\Domain\Model\Checkout\Checkout;
use App\WebshopBundle\Domain\Model\Checkout\CheckoutRepositoryInterface;
use App\WebshopBundle\Domain\Model\Checkout\Dto\Address;
use App\WebshopBundle\Domain\Model\Checkout\Dto\CheckoutTotal;
use App\WebshopBundle\Domain\Model\Checkout\Dto\Customer;
use App\WebshopBundle\Domain\Model\Checkout\Dto\PaymentMethod;
use App\WebshopBundle\Domain\Model\Checkout\Dto\ShippingMethod;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use function dd;
use function floatval;
use function json_decode;

class HttpCheckoutRepository implements CheckoutRepositoryInterface
{
    public function __construct(
        private string $url,
        private Client $client = new Client()
    )
    {
    }

    public function createCheckout(string $cartId): Checkout
    {
        $response = $this->client->post($this->url.'/checkoutinit', [
            'headers' => [
                'Content-Type' => 'application/json',
                //'Authorization' => 'Bearer ' . $accessToken->getToken()
            ],
            'json' => ['cartId' => $cartId],
            'verify' => 0
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        $checkout = new Checkout();
        $checkout->setId($response['checkoutId']);
        return $checkout;
    }

    public function addCustomer(Customer $customer): Checkout
    {
        $response = $this->client->post($this->url.'/customer', [
            'headers' => [
                'Content-Type' => 'application/json',
                //'Authorization' => 'Bearer ' . $accessToken->getToken()
            ],
            'json' => [
                'email' => $customer->getEmail(),
                'lastName' => $customer->getLastName(),
                'firstName' => $customer->getFirstName(),
                'phone' => $customer->getPhone()
                ],
            'verify' => 0
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        $customer = new Customer($response['email'],$response['lastName'],$response['firstName'],$response['phone']);
        $checkout = new Checkout();
        $checkout->setCustomer($customer);
        return $checkout;
    }

    public function addShippingAddress(string $checkoutId, Address $address): Checkout
    {
        return new Checkout();
    }

    public function addPaymentAddress(Address $address): Checkout{
        return new Checkout();
    }

    public function addShippingMethod(ShippingMethod $shippingMethod): Checkout{
        $response = $this->client->post($this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                //'Authorization' => 'Bearer ' . $accessToken->getToken()
            ],
            'json' => [
                'shipingMethodId' => $shippingMethod->getShippingMethodId()
            ],
            'verify' => 0
        ]);

        $response = json_decode($response->getBody()->getContents(), true);


        $shippingMethod = new ShippingMethod($response['shippingMethodId'],$response['shippingMethodName'],$response['shippingMethodFee']);
        $checkout = new Checkout();
        $checkout->setShippingMethod($shippingMethod);
        return $checkout;
    }

    public function addPaymentMethod(string $checkoutId, string $paymentMethodId): Checkout{
        $response = $this->client->post($this->url . '/' . $checkoutId, [
            'headers' => [
                'Content-Type' => 'application/json',
                //'Authorization' => 'Bearer ' . $accessToken->getToken()
            ],
            'json' => [
                'paymentMethodId' => $paymentMethodId
            ],
            'verify' => 0
        ]);

        $response = json_decode($response->getBody()->getContents(), true);


        $shippingMethod = new PaymentMethod($response['paymentMethodId'],$response['paymentMethodName'],$response['paymentMethodFee']);
        $checkout = new Checkout();
        $checkout->setPaymentMethode($shippingMethod);
        return $checkout;
    }

    public function confirmCheckout(string $checkoutId): Checkout{
        try {
            $response = $this->client->post($this->url . "/" . $checkoutId . "/confirm", [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'verify' => 0
            ]);
        } catch (GuzzleException $e) {
            throw new DomainException($e->getMessage());
        }

        $response = json_decode($response->getBody()->getContents(), true);

        $checkout = new Checkout();
        $checkout->setId($response['checkoutId']);
        $checkout->setStatus($response['status']);
        $checkout->setCustomer(new Customer($response['customer']['email'],$response['customer']['firstName'],$response['customer']['lastName'],$response['customer']['phone']));
        $checkout->setCheckoutTotal(new CheckoutTotal(floatval($response['checkoutTotal']['value']), $response['checkoutTotal']['currency']));
        $checkout->setPaymentMethode(new PaymentMethod($response['paymentMethod']['paymentMethodId'], $response['paymentMethod']['paymentMethodName'], floatval($response['paymentMethod']['paymentFee'])));
        $checkout->setShippingMethod(new ShippingMethod($response['shippingMethod']['shippingMethodId'], $response['shippingMethod']['shippingMethodName'], floatval($response['shippingMethod']['shippingFee'])));
        $checkout->setPaymentAddress(new Address($response['billingAddress']['address'], $response['billingAddress']['city'], $response['billingAddress']['postcode'], $response['billingAddress']['country']));
        $checkout->setShippingAddress(new Address($response['shippingAddress']['address'], $response['shippingAddress']['city'], $response['shippingAddress']['postcode'], $response['shippingAddress']['country']));
        return $checkout;
    }

    public function addCheckoutTotal(CheckoutTotal $checkoutTotal): Checkout
    {
        return new Checkout();
    }

    public function getCheckout(string $checkoutId): ?Checkout
    {
        $response = $this->client->get($this->url.'/get', [
            'headers' => [
                'Content-Type' => 'application/json',
                //'Authorization' => 'Bearer ' . $accessToken->getToken()
            ],
            'json' => ['checkoutId' => $checkoutId],
            'verify' => 0
        ]);

        $checkout = new Checkout();
        $checkout->setId($response['checkoutId']);
        $checkout->setStatus($response['status']);
        $checkout->setCustomer(new Customer($response['customer']['email'],$response['customer']['firstName'],$response['customer']['lastName'],$response['customer']['phone']));
        $checkout->setCheckoutTotal(new CheckoutTotal(floatval($response['checkoutTotal']['value']), $response['checkoutTotal']['currency']));
        $checkout->setPaymentMethode(new PaymentMethod($response['paymentMethod']['paymentMethodId'], $response['paymentMethod']['paymentMethodName'], floatval($response['paymentMethod']['paymentFee'])));
        $checkout->setShippingMethod(new ShippingMethod($response['shippingMethod']['shippingMethodId'], $response['shippingMethod']['shippingMethodName'], floatval($response['shippingMethod']['shippingFee'])));
        $checkout->setPaymentAddress(new Address($response['billingAddress']['address'], $response['billingAddress']['city'], $response['billingAddress']['postcode'], $response['billingAddress']['country']));
        $checkout->setShippingAddress(new Address($response['shippingAddress']['address'], $response['shippingAddress']['city'], $response['shippingAddress']['postcode'], $response['shippingAddress']['country']));
        return $checkout;
    }


}
