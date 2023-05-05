<?php

namespace App\Application\DeleteShippingMethod;

class DeleteShippingMethodCommand
{
    public function __construct(public string $shippingMethodId)
    {
    }

    /**
     * @return string
     */
    public function getShippingMethodId(): string
    {
        return $this->shippingMethodId;
    }
}
