<?php

namespace App\WebshopBundle\Infrastructure\Shipping;

use App\WebshopBundle\Domain\Model\Shipping\Dto\ShippingLane;
use App\WebshopBundle\Domain\Model\Shipping\Dto\ShippingMethod;
use App\WebshopBundle\Domain\Model\Shipping\Shipping;
use App\WebshopBundle\Domain\Model\Shipping\ShippingRepositoryInterface;
use GuzzleHttp\Client;

class HttpShippingRepository implements ShippingRepositoryInterface
{

    public function __construct(
        private string $url,
        private Client $client = new Client()
    )
    {
    }

    public function getShippingMethodsByCartTotal(float $cartTotal): Shipping
    {
        $response = $this->client->get($this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                //'Authorization' => 'Bearer ' . $accessToken->getToken()
            ],
            'json' => ['cartTotal' => $cartTotal],
            'verify' => 0
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        /**
         * @var ShippingMethod[] $shippingMethods
         */
        $shippingMethods = [];

        foreach ($response as $shippingMethod) {
            /**
             * @var ShippingLane[] $shippingLanes
             */
            $shippingLanes = array();
            foreach ($shippingMethod['shippingLanes'] as $shippingLane) {
                $createdShippingLane = new ShippingLane(
                    floatval($shippingLane['minGrossPrice']),
                    floatval($shippingLane['maxGrossPrice']),
                    floatval($shippingLane['cost'])
                );
                $shippingLanes[] = $createdShippingLane;
            }
            $createdShippingMethod = new ShippingMethod(
                $shippingMethod['id'],
                boolval( $shippingMethod['isEnabled']),
                $shippingMethod['name'],
                $shippingMethod['description'],
                $shippingLanes
            );
            $shippingMethods[] = $createdShippingMethod;
        }

        $shipping = new Shipping();
        $shipping->setShippingMethods($shippingMethods);
        return $shipping;
    }
}