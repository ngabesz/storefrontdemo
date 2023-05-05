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

class CheckoutDummyController extends AbstractController
{

    public function init(Request $request)
    {
        return new Response(json_encode(['checkoutId'=>"alma"]),200,['Content-Type'=>'application/json']);
    }
}