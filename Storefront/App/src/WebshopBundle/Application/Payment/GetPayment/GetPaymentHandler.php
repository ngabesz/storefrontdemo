<?php

namespace App\WebshopBundle\Application\Payment\GetPayment;

use App\WebshopBundle\Application\Payment\GetPayment\Dto\GetPaymentOutput;
use App\WebshopBundle\Domain\Model\Payment\PaymentRepositoryInterface;

class GetPaymentHandler
{
    private PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function __invoke(GetPaymentQuery $getPaymentQuery){
        $paymentMethods = $this->paymentRepository->getPaymentMethodsByShippingMethod($getPaymentQuery->getShippingId());
        return new GetPaymentOutput($paymentMethods->getPaymentMethods());
    }
}