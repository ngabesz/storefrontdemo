<?php

namespace App\Presentation\Api\Controller;

use App\Application\Order\List\ListOrderFilteredQuery;
use App\Presentation\Api\Security\Symfony\Voter\OrderAccessTokenVoter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ListOrderController extends AbstractController
{
    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function indexAction(Request $request): JsonResponse
    {
        $this->denyAccessUnlessGranted(OrderAccessTokenVoter::ORDER_READ, $request);

        try {
            $response = $this->handle(new ListOrderFilteredQuery(null));
            $response = ['orders' => $response];

            return $this->json($response);
        } catch (HandlerFailedException $exception) {
            return $this->json(['error' => $exception->getMessage(), 500]);
        }
    }

    public function getAction(string $id, Request $request): JsonResponse
    {
        $this->denyAccessUnlessGranted(OrderAccessTokenVoter::ORDER_READ, $request);

        try {
            $response = $this->handle(new ListOrderFilteredQuery($id));
            if (!empty($response)) {
                $response = array_pop($response);
            }
            return $this->json($response);
        } catch (HandlerFailedException $exception) {
            return $this->json(['error' => $exception->getMessage(), 500]);
        }
    }
}
