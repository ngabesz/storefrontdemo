<?php

namespace App\Presentation\Api\Security\Jwt;

interface PublicKeyProviderInterface
{
    public function getPublicKey(): ?string;
}