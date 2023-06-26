<?php

namespace App\Presentation\Api\Security\Jwt;

use function file_get_contents;

class FilesystemPublicKeyProvider implements PublicKeyProviderInterface
{
    public function __construct(
        private string $pemPath,
    ) {}

    public function getPublicKey(): ?string
    {
        if(!$key = file_get_contents($this->pemPath)) {
            return null;
        }

        return $key;
    }
}