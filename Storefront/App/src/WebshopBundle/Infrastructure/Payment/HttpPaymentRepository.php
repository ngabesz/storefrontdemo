<?php

namespace App\WebshopBundle\Infrastructure\Payment;

use App\WebshopBundle\Domain\Model\Payment\Dto\PaymentMethod;
use App\WebshopBundle\Domain\Model\Payment\Payment;
use App\WebshopBundle\Domain\Model\Payment\PaymentRepositoryInterface;
use GuzzleHttp\Client;

class HttpPaymentRepository implements PaymentRepositoryInterface
{
    public function __construct(
        private string $url,
        private Client $client = new Client()
    )
    {
    }


    public function getPaymentMethodsByShippingMethod(string $shippingMethod): Payment
    {

        $response = $this->client->get($this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                //'Authorization' => 'Bearer ' . $accessToken->getToken()
            ],
            'json' => ['shippingMethod' => $shippingMethod],
            'verify' => 0
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        /**
         * @var PaymentMethod[] $paymentMethods
         */
        $paymentMethods = [];

        foreach ($response as $paymentMethod) {
            $createdPaymentMethod = new PaymentMethod(
                $paymentMethod['id'],
                $paymentMethod['name'],
                $paymentMethod['description'],
                floatval($paymentMethod['fee'])
            );
            $paymentMethods[] = $createdPaymentMethod;
        }

        $payment = new Payment();
        $payment->setPaymentMethods($paymentMethods);
        return $payment;
    }
}