<?php

namespace App\WebshopBundle\Domain\Model\Payment\Dto;

class PaymentMethod
{
    private string $id;
    private string $name;
    private string $description;
    private float $fee;

    public function __construct(string $id, string $name, string $description, float $fee)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->fee = $fee;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getFee(): float
    {
        return $this->fee;
    }




}