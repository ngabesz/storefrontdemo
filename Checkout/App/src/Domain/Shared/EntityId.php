<?php

namespace App\Domain\Shared;

class EntityId
{
    public function __construct(
        public string $value
    ) {
    }
}