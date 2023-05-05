<?php

namespace App\WebshopBundle\Presentation\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShippingDummyController extends AbstractController
{

    public function init(Request $request)
    {
        return new Response(json_encode(['cartTotal' => "10000"]), 200, ['Content-Type' => 'application/json']);
    }

}