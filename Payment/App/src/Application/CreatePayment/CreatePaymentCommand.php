<?php

namespace App\Application\CreatePayment;

class CreatePaymentCommand
{
    private string $paymentId;

    private string $paymentMethodId;

    private array $customer;

    private float $amount;

    private string $initialState;

    public function __construct(
        string $paymentId,
        string $paymentMethodId,
        array $customer,
        float $amount,
        ?string $initialState = null
    ) {
        $this->paymentId = $paymentId;
        $this->paymentMethodId = $paymentMethodId;
        $this->customer = $customer;
        $this->amount = $amount;
        $this->initialState = $initialState;
    }

    /**
     * @return string
     */
    public function getPaymentMethodId(): string
    {
        return $this->paymentMethodId;
    }

    /**
     * @return array
     */
    public function getCustomer(): array
    {
        return $this->customer;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getInitialState(): string
    {
        return $this->initialState;
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

}
