<?php

namespace App\Domain\Shared;

interface EntityIdGeneratorInterface
{
    public function generate(): EntityId;
}