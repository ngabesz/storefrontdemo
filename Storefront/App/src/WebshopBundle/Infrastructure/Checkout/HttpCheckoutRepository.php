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
use App\WebshopBundle\Domain\Model\Checkout\Dto\PaymentMethod;
use App\WebshopBundle\Domain\Model\Checkout\Dto\ShippingMethod;
use App\WebshopBundle\Domain\Model\Customer\Customer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use function dd;
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
        $response = $this->client->post($this->url, [
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
        return new Checkout();
    }
    public function addShippingAddress(Address $address): Checkout
    {
        return new Checkout();
    }
    public function addPaymentAddress(Address $address): Checkout{
        return new Checkout();
    }
    public function addShippingMethod(ShippingMethod $shippingMethod): Checkout{
        return new Checkout();
    }
    public function addPaymentMethod(PaymentMethod $paymentMethod): Checkout{
        return new Checkout();
    }
    public function confirmCheckout(Checkout $checkout): Checkout{
        return new Checkout();
    }
    public function addCheckoutTotal(CheckoutTotal $checkoutTotal): Checkout{
        return new Checkout();
    }
    public function getCheckout(string $checkoutId): ?Checkout{
        return new Checkout();
    }


}