<?php

namespace App\Infrastructure\Adapter\OrderApi;


use App\Domain\Api\OrderApiInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OrderApi implements OrderApiInterface
{
    public function __construct(
        private HttpClientInterface $client
    ) {
        $this->client = $client->withOptions([
            'base_uri' => 'http://api_gateway_nginx:8080'
        ]);
    }

    public function createOrder(string $checkoutId): void
    {
        $this->client->request('POST', '/order/api/orders', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'checkoutId' => $checkoutId
            ]
        ]);
    }
}
