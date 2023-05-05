<?php

namespace App\Application\SavePaymentMethod;

class SavePaymentMethodCommand
{
    public function __construct(
        public readonly string $checkoutId,
        public readonly string $externalPaymentMethodId
    ){}
}
