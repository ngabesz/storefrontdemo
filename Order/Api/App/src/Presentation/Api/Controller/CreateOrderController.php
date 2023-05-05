<?php

namespace App\Presentation\Api\Controller;

use App\Application\Order\Create\CreateOrderCommand;
use App\Domain\Order\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

class CreateOrderController extends AbstractController
{
    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function index(Request $request)
    {
        try {
            $checkoutId = json_decode($request->getContent(), true)['checkoutId'];
        } catch (Throwable $throwable) {
            return $this->json(['error' => $throwable->getMessage()]);
        }

        if (!$checkoutId) {
            return $this->json(['error' => 'no checkoutId']);
        }

        try {
            $createOrderCommand = new CreateOrderCommand($checkoutId);
            /** @var Order $orderOutput */
            $orderOutput = $this->handle($createOrderCommand);

            return $this->json($orderOutput);
        } catch (Throwable $throwable) {
            return $this->json(['error' => $throwable->getMessage()]);
        }
    }
}
