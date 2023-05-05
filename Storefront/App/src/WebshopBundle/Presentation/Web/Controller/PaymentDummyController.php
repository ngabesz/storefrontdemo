<?php

namespace App\WebshopBundle\Presentation\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentDummyController extends AbstractController
{
    public function init(Request $request)
    {
        return new Response(json_encode(['id' => "123asd", 'name' => 'Keszpenz', 'description' => 'ASDasdqweQWE', 'fee' => '123.3']), 200, ['Content-Type' => 'application/json']);
    }
}