<?php

namespace App\Infrastructure\Adapter\ShippingApi;

use App\Domain\Api\ShippingApiInterface;
use App\Domain\Shared\EntityIdGeneratorInterface;
use App\Domain\ShippingMethod;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ShippingApi implements ShippingApiInterface
{

    public function __construct(
        private HttpClientInterface $client,
        private EntityIdGeneratorInterface $entityIdGenerator
    ) {
        $this->client = $client->withOptions([
            'base_uri' => 'http://api_gateway_nginx:8080/shipping'
        ]);
    }

    public function getShippingMethod(string $externalShippingMethodId): ShippingMethod
    {
        $response = $this->client->request('GET', "/api/shipping-methods/$externalShippingMethodId");
        $data = json_decode($response->getContent(), true);
        return new ShippingMethod(
            $this->entityIdGenerator->generate(),
            $externalShippingMethodId,
            $data['name'],
            $data['cost']
        );
    }
}