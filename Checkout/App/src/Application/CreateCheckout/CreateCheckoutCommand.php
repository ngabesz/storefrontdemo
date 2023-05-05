<?php

class CreateCheckoutCommand
{
    public function __construct(
        public readonly string $cartId
    ) {
    }
}