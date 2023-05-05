<?php

namespace App\Presentation\Api\Controller;

use App\Application\CreateCheckout\CreateCheckoutCommand;
use Nyholm\Psr7\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Serializer\SerializerInterface;

class CheckoutController extends AbstractController
{
    use HandleTrait;
    public function __construct(MessageBusInterface $messageBus,SerializerInterface $serializer)
    {
        $this->messageBus = $messageBus;
        $this->serializer = $serializer;
    }

    public function createCheckout(Request $request)
    {
        $post = json_decode($request->getContent());
        $command = new CreateCheckoutCommand($post->cartId);

        $response = $this->handle(
            $command
        );

        $jsonresponse = $this->serializer->serialize($response,'json');
        return new Response($jsonresponse);
    }

    public function getCheckout(Request $request)
    {

    }

    public function saveCustomer(Request $request)
    {

    }

    public function saveShippingAddress(Request $request)
    {

    }

    public function saveBillingAddress(Request $request)
    {

    }

    public function savePaymentMethod(Request $request)
    {

    }

    public function confirm(Request $request)
    {

    }
}