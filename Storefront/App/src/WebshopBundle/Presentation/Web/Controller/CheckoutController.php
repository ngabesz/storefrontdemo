<?php

namespace App\WebshopBundle\Presentation\Web\Controller;

use App\WebshopBundle\Application\Cart\AddToCart\AddToCartCommand;
use App\WebshopBundle\Application\Cart\CreateCart\CreateCartCommand;
use App\WebshopBundle\Application\Cart\CreateCart\Dto\CreateCartOutput;
use App\WebshopBundle\Application\Cart\Exception\CartNotFoundException;
use App\WebshopBundle\Application\Cart\GetCart\Dto\GetCartOutput;
use App\WebshopBundle\Application\Cart\GetCart\GetCartQuery;
use App\WebshopBundle\Application\Cart\RemoveItemFromCart\RemoveItemFromCartCommand;
use App\WebshopBundle\Application\Checkout\CreateCheckout\CreateCheckoutQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use function dd;

class CheckoutController extends AbstractController
{
    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function index(Request $request)
    {

        if ($request->cookies->has('cart_id')) {
            $checkout = $this->handle(new CreateCheckoutQuery($request->cookies->get('cart_id')));
        }

        return $this->render('@webshop/customer_space/checkout.html.twig', [
            'checkoutId' => $checkout->getCheckoutId()
        ]);
    }
}