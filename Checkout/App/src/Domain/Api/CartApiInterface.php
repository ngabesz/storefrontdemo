<?php

namespace App\Domain\Api;

use App\Domain\Cart;

interface CartApiInterface
{
    public function getCart(string $externalCartId): Cart;
}