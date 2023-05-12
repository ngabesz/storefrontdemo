<?php


namespace App\WebshopBundle\Presentation\Web\Controller;


use App\WebshopBundle\Application\Cart\GetCart\GetCartQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ThankYouController extends AbstractController
{
    public function index(Request $request)
    {
        return $this->render('@webshop/thankyou.html.twig');
    }
}