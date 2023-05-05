<?php

namespace App\Application\Order\Create;
class CreateOrderCommand
{

    private string $checkoutId;

    public function __construct(string $checkoutId)
    {
        $this->checkoutId = $checkoutId;
    }

    /**
     * @return string
     */
    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }


}
