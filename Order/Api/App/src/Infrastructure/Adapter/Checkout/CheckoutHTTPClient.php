<?php

namespace App\Infrastructure\Adapter\Checkout;

use GuzzleHttp\Client;

class CheckoutHTTPClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function get(string $id): array
    {
        $uri = 'http://api_gateway_nginx:8080/checkout/api/checkout/' . $id;
        $options = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
        ];
        try {
            $response = $this->client->get($uri, $options);
            return json_decode($response->getBody(), true);
        } catch (\Throwable $throwable) {

        }
    }
}
