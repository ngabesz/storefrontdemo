<?php

namespace App\WebshopBundle\Domain\Model\Payment;

use App\WebshopBundle\Domain\Model\Payment\Dto\PaymentMethod;

class Payment
{
    /**
     * @var PaymentMethod[] $paymentMethods
     */
    private array $paymentMethods;

    /**
     * @return PaymentMethod[]
     */
    public function getPaymentMethods(): array
    {
        return $this->paymentMethods;
    }

    /**
     * @param PaymentMethod[] $paymentMethods
     */
    public function setPaymentMethods(array $paymentMethods): void
    {
        $this->paymentMethods = $paymentMethods;
    }



}