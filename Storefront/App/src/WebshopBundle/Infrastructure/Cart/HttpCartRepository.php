<?php


namespace App\WebshopBundle\Infrastructure\Cart;

use App\WebshopBundle\Domain\Exception\DomainException;
use App\WebshopBundle\Domain\Model\Cart\Cart;
use App\WebshopBundle\Domain\Model\Cart\CartRepositoryInterface;
use App\WebshopBundle\Domain\Model\Cart\Dto\AddToCartInput;
use App\WebshopBundle\Domain\Model\Cart\ItemCollection;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use function dd;
use function json_decode;

class HttpCartRepository implements CartRepositoryInterface
{
    public function __construct(
        private string $url,
        private Client $client = new Client()
    )
    {}

    public function createCart(): Cart
    {
            $response = $this->client->post($this->url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    //'Authorization' => 'Bearer ' . $accessToken->getToken()
                ],
                'verify' => 0
            ]);

            $response = json_decode($response->getBody()->getContents(), true);

            return new Cart(
                $response['id'],
                $response['customerIdentifier'],
                new ItemCollection($response['items']),
                $response['total'],
            );
    }

    public function addToCart(AddToCartInput $addToCartInput): Cart
    {
        $response = $this->client->post($this->url . "/". $addToCartInput->getCartId(), [
            'headers' => [
                'Content-Type' => 'application/json',
                //'Authorization' => 'Bearer ' . $accessToken->getToken()
            ],
            'verify' => 0,
            'json' => [
                'items' => [
                    [
                        'sku' => $addToCartInput->getSku(),
                        'quantity' => $addToCartInput->getQuantity()
                    ]
                ]
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        return new Cart(
            $response['id'],
            $response['customerIdentifier'],
            new ItemCollection($response['items']),
            $response['total'],
        );
    }

    public function getCart(string $cartId): ?Cart
    {
        try {
            $response = $this->client->get($this->url . "/" . $cartId, [
                'headers' => [
                    'Accept' => 'application/json',
                    //'Authorization' => 'Bearer ' . $accessToken->getToken()
                ],
                'verify' => 0,
            ]);
        } catch (GuzzleException $e) {
             return null;
        }

        $response = json_decode($response->getBody()->getContents(), true);

        return new Cart(
            $response['id'],
            $response['customerIdentifier'],
            new ItemCollection($response['items']),
            $response['total'],
        );
    }

    public function removeItemFromCart(string $cartId, string $itemId): void
    {
        try {
            $this->client->delete("{$this->url}/{$cartId}/items/{$itemId}", [
                'verify' => 0,
            ]);
        } catch (GuzzleException $e) {
            throw new DomainException($e->getMessage(), $e->getCode());
        }
    }
}