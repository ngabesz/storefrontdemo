<?php

namespace App\Presentation\Api\Controller;

use App\Application\ConfirmCheckout\ConfirmCheckoutCommand;
use App\Application\CreateCheckout\CreateCheckoutCommand;
use App\Application\GetCheckout\GetCheckoutQuery;
use App\Application\SaveCustomer\SaveCustomerCommand;
use App\Application\SaveShippingAddress\SaveShippingAddressCommand;
use App\Application\SaveBillingAddress\SaveBillingAddressCommand;
use App\Application\SaveShippingMethod\SaveShippingMethodCommand;
use App\Application\SavePaymentMethod\SavePaymentMethodCommand;
use Symfony\Component\HttpFoundation\Request;
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

    public function getCheckout(string $checkoutId)
    {
        $query = new GetCheckoutQuery($checkoutId);

        $response = $this->handle(
            $query
        );

        $jsonresponse = $this->serializer->serialize($response,'json');
        return new Response($jsonresponse);
    }

    public function saveCustomer(string $checkoutId, Request $request)
    {
        $post = json_decode($request->getContent());
        $command = new SaveCustomerCommand(
            $checkoutId,
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

    public function saveShippingAddress(string $checkoutId, Request $request)
    {
        $post = json_decode($request->getContent());
        $command = new SaveShippingAddressCommand(
            $checkoutId,
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
        $post = json_decode($request->getContent());
        $command = new SavePaymentMethodCommand($post->checkoutId);

        $response = $this->handle(
            $command
        );

        $jsonresponse = $this->serializer->serialize($response,'json');
        return new Response($jsonresponse);
    }

    public function saveShippingMethod(Request $request)
    {
        $post = json_decode($request->getContent());
        $command = new SaveShippingMethodCommand($post->checkoutId);

        $response = $this->handle(
            $command
        );

        $jsonresponse = $this->serializer->serialize($response,'json');
        return new Response($jsonresponse);
    }

    public function confirm(string $checkoutId)
    {
        $command = new ConfirmCheckoutCommand($checkoutId);
        $response = $this->handle($command);

        return new Response($this->serializer->serialize($response,'json'));
    }
}