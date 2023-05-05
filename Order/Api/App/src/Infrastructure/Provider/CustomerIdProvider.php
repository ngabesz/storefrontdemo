<?php

namespace App\Infrastructure\Provider;

use App\Domain\Customer\CustomerIdProviderInterface;
use Symfony\Component\Uid\Uuid;

class CustomerIdProvider implements CustomerIdProviderInterface
{
    public function getNewCustomerId(): string
    {
        return Uuid::v4();
    }
}
