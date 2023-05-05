<?php

namespace App\Application\GetShippingMethodById;

class GetShippingMethodByIdQuery
{
    public function __construct(private readonly string $id) {}

    public function getId(): string
    {
        return $this->id;
    }
}
