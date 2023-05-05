<?php

namespace App\Domain\Customer;

interface CustomerIdProviderInterface
{
    public function getNewCustomerId(): string;
}
