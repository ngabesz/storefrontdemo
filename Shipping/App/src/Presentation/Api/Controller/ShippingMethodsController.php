<?php

namespace App\Presentation\Api\Controller;

use App\Application\FetchShippingMethods\FetchShippingMethodsQuery;
use App\Application\GetShippingMethodById\GetShippingMethodByIdQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class ShippingMethodsController extends AbstractController
{
    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function fetchShippingMethods(): JsonResponse
    {
        return $this->json([
            $this->handle(
                new FetchShippingMethodsQuery(200.0)
            )
        ]);
    }

    public function getShippingMethodById(Request $request): JsonResponse
    {
        $shippingMethodId = $request->get("shippingMethodId");

        if (!$shippingMethodId) {
            return $this->json([
                "error" => "shippingMethodId is required"
            ]);
        }

        return $this->json(
            $this->handle(
                new GetShippingMethodByIdQuery($shippingMethodId)
            )
        );
    }
}
