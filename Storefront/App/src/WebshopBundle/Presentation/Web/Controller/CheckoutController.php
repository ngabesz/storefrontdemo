<?php

namespace App\WebshopBundle\Presentation\Web\Controller;

use App\WebshopBundle\Application\Cart\AddToCart\AddToCartCommand;
use App\WebshopBundle\Application\Cart\CreateCart\CreateCartCommand;
use App\WebshopBundle\Application\Cart\CreateCart\Dto\CreateCartOutput;
use App\WebshopBundle\Application\Cart\Exception\CartNotFoundException;
use App\WebshopBundle\Application\Cart\GetCart\Dto\GetCartOutput;
use App\WebshopBundle\Application\Cart\GetCart\GetCartQuery;
use App\WebshopBundle\Application\Cart\RemoveItemFromCart\RemoveItemFromCartCommand;
use App\WebshopBundle\Application\Checkout\AddShippingAddress\AddShippingAddressCommand;
use App\WebshopBundle\Application\Checkout\ConfirmCheckout\ConfirmCheckoutCommand;
use App\WebshopBundle\Application\Checkout\CreateCheckout\CreateCheckoutQuery;
use App\WebshopBundle\Application\Checkout\Customer\CreateCustomerCommand;
use App\WebshopBundle\Application\Checkout\GetCheckout\GetCheckoutQuery;
use App\WebshopBundle\Application\Checkout\PaymentMethod\CreatePaymentMethodQuery;
use App\WebshopBundle\Application\Payment\GetPayment\GetPaymentQuery;
use App\WebshopBundle\Application\Shipping\GetShipping\GetShippingQuery;
use App\WebshopBundle\Domain\Model\Checkout\Dto\Address;
use App\WebshopBundle\Domain\Model\Checkout\Dto\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
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
            $request->cookies->set('checkoutId', $checkout->getCheckoutId());
            return $this->render('@webshop/customer_space/checkout.html.twig', []);
        }
        $this->redirect('/cart');
    }

    public function addCustomer(Request $request)
    {
        if (!$request->cookies->has('checkoutId')) {
            $this->redirect('/checkout');
        }
        $customer = new Customer(
            $request->get("email",null),
            $request->get("firstName",null),
            $request->get("lastName",null),
            $request->get("phone",null)
        );
        $this->handle(new CreateCustomerCommand($customer));

        $this->handle(new AddShippingAddressCommand(
            $request->cookies->get('checkoutId'),
            new Address(
                $request->get("address",null),
                $request->get("city",null),
                $request->get("postcode",null),
                $request->get("country",null),
            )
        ));

        $this->handle(new AddPaymentAddressCommand(
            $request->cookies->get('checkoutId'),
            new Address(
                $request->get("address",null),
                $request->get("city",null),
                $request->get("postcode",null),
                $request->get("country",null),
            )
        ));
        $this->redirect('/checkout/step/2');
    }

    public function createShippingMethod(Request $request)
    {
        if (!$request->cookies->has('checkoutId')) {
            $this->redirect('/checkout');
        }

        $checkout = $this->handle(new GetCheckoutQuery($request->cookies->get('checkoutId')));

        $shippingMethods = $this->handle(new GetShippingQuery($checkout->getId()));

        return $this->render('@webshop/customer_space/checkoutStep2.html.twig', ['shippingMethods'=> $shippingMethods]);
    }

    public function addShippingMethod(Request $request)
    {
        if (!$request->cookies->has('checkoutId')) {
            $this->redirect('/checkout');
        }

        $this->handle(new AddShippingMethodCommand(
            $request->cookies->get('checkoutId'),
            $request->cookies->get('shippingMethodId')
        ));

        $this->redirect('/checkout/step/3');
    }

    public function createPaymentMethod(Request $request)
    {
        if (!$request->cookies->has('checkoutId')) {
            $this->redirect('/checkout');
        }

        $checkout = $this->handle(new GetCheckoutQuery($request->cookies->get('checkoutId')));

        $paymentMethods = $this->handle(new GetPaymentQuery($checkout->getId()));

        return $this->render('@webshop/customer_space/checkoutStep3.html.twig', ['paymentMethods'=> $paymentMethods]);
    }

    public function addPaymentMethod(Request $request)
    {
        if (!$request->cookies->has('checkoutId')) {
            $this->redirect('/checkout');
        }

        $this->handle(new CreatePaymentMethodQuery(
            $request->cookies->get('checkoutId'),
            $request->cookies->get('paymentMethodId')
        ));

        $this->redirect('/checkout/step/3');
    }

    public function confirm(Request $request)
    {
        if (!$request->cookies->has('checkoutId')) {
            $this->redirect('/checkout');
        }

        try {
            $this->handle(new ConfirmCheckoutCommand(
                $request->cookies->get('checkoutId')
            ));
        } catch (HandlerFailedException $e) {
            return new JsonResponse(
                [
                    'status' => 'szoptad',
                    'message' => $e->getMessage()
                ],
                Response::HTTP_BAD_REQUEST
            );
        }

        $this->redirect('/thankyou');
    }
}
