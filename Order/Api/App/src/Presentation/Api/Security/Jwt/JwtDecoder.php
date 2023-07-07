<?php

namespace App\Presentation\Api\Security\Jwt;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use stdClass;
use function dd;
use function str_replace;

class JwtDecoder
{

    public function __construct(
        private PublicKeyProviderInterface $keyProvider
    ) {}

    public function decode(string $jwtToken): stdClass
    {
        $jwtToken = str_replace("Bearer ", "", $jwtToken);
        $publicKey = $this->keyProvider->getPublicKey();

        if (!$publicKey) {
            throw new Exception("Public key is not found");
        }

        return JWT::decode($jwtToken, new Key($publicKey, 'RS256'));
    }
}