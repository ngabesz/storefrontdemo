<?php

namespace App\Infrastructure\Adapter\CartApi;

use App\Domain\Api\CartApiInterface;
use App\Domain\Cart;
use App\Domain\CartItem;
use App\Domain\Shared\EntityIdGeneratorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CartApi implements CartApiInterface
{


    public function __construct(
        private HttpClientInterface $client,
        private EntityIdGeneratorInterface $entityIdGenerator
    ) {
        $this->client = $client->withOptions([
            'base_uri' => 'http://api_gateway_nginx:8080/cart'
        ]);
    }

    public function getCart(string $externalCartId): Cart
    {
        $response = $this->client->request('GET', "/carts/$externalCartId");
        $data = json_decode($response->getContent());

        $cart = new Cart(
            $this->entityIdGenerator->generate(),
            $data['id'],
            $data['total']
        );

        foreach ($data['items'] as $item) {
            $cart->addCartItem(new CartItem(
                $this->entityIdGenerator->generate(),
                $item['id'],
                $item['sku'],
                'some productn name',
                $item['quantity'],
                $item['price'],
                $item['total']
            ));
        }

        return $cart;
    }
}