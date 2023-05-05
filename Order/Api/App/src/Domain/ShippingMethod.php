<?php

namespace App\Domain;

class ShippingMethod
{

    private string $id;
    private string $name;
    private string $code;
    private float $grossPrice;

    /**
     * @param string $id
     * @param string $name
     * @param string $code
     * @param float $grossPrice
     */
    public function __construct(string $id, string $name, string $code, float $grossPrice)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->grossPrice = $grossPrice;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return float
     */
    public function getGrossPrice(): float
    {
        return $this->grossPrice;
    }

}
