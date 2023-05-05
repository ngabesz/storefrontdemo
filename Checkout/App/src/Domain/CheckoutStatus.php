<?php

namespace App\Domain;

enum CheckoutStatus: string
{
    case Pending = 'pending';
    case Completed = 'completed';
}
