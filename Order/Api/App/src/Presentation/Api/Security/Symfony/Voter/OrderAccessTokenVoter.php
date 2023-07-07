<?php

namespace App\Presentation\Api\Security\Symfony\Voter;

use App\Presentation\Api\Security\Jwt\JwtDecoder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

use function in_array;

class OrderAccessTokenVoter extends Voter
{
    public const
        ORDER_READ = "order_read",
        ORDER_WRITE = "order_write";

    public const reader = [
        self::ORDER_READ
    ];

    public const writer = [
        self::ORDER_READ,
        self::ORDER_WRITE
    ];

    public function __construct(
        private JwtDecoder $jwtDecoder
    ) {}


    protected function supports(string $attribute, mixed $subject): bool
    {
        /** @var Request $subject */

        if (!in_array($attribute, [self::ORDER_READ, self::ORDER_WRITE])) {
            return false;
        }

        if (!$subject instanceof Request || !$subject->headers->has('Authorization')) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        //TODO: Ha vki kap write jogot, akkor van olvasási joga, ezt még ki kell gondolni
        /** @var Request $subject */

        $token = $subject->headers->get('Authorization');
        $jwtPayload = $this->jwtDecoder->decode($token);

        return in_array($attribute, $jwtPayload->scopes);
    }
}