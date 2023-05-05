<?php

namespace App\Presentation\Api\Controller;

use App\Application\CreateCheckout\CreateCheckoutCommand;
use App\Application\SaveCustomer\SaveCustomerCommand;
use App\Application\SaveShippingAddress\SaveShippingAddressCommand;
use App\Application\SaveBillingAddress\SaveBillingAddressCommand;
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
        $post = json_decode($request->getContent());
        $command = new SaveCustomerCommand(
            $post->checkoutId,
            $post->email,
            $post->lastName,
            $post->firstName,
            $post->phone
        );

        $response = $this->handle(
            $command
        );

        $jsonresponse = $this->serializer->serialize($response,'json');
        return new Response($jsonresponse);
    }

    public function saveShippingAddress(Request $request)
    {
        $post = json_decode($request->getContent());
        $command = new SaveShippingAddressCommand(
            $post->checkoutId,
            $post->address,
            $post->country,
            $post->postcode,
            $post->city
        );

        $response = $this->handle(
            $command
        );

        $jsonresponse = $this->serializer->serialize($response,'json');
        return new Response($jsonresponse);
    }

    public function saveBillingAddress(Request $request)
    {
        $post = json_decode($request->getContent());
        $command = new SaveBillingAddressCommand(
            $post->checkoutId,
            $post->address,
            $post->country,
            $post->postcode,
            $post->city
        );

        $response = $this->handle(
            $command
        );

        $jsonresponse = $this->serializer->serialize($response,'json');
        return new Response($jsonresponse);
    }

    public function savePaymentMethod(Request $request)
    {

    }

    public function saveShippingMethod(Request $request)
    {

    }

    public function confirm(Request $request)
    {

    }
}