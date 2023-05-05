<?php

namespace App\WebshopBundle\Application\Payment\GetPayment\Dto;

use App\WebshopBundle\Domain\Model\Payment\Dto\PaymentMethod;

class GetPaymentOutput
{
    /**
     * @var PaymentMethod[]
     */
    private array $paymentMethods;

    public function __construct(array $paymentMethods)
    {
        $this->paymentMethods = $paymentMethods;
    }

    public function getPaymentMethods(): array
    {
        return $this->paymentMethods;
    }
}