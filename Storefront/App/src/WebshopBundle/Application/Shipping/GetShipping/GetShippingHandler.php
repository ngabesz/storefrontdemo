<?php

namespace App\WebshopBundle\Application\Shipping\GetShipping;

use App\WebshopBundle\Application\Shipping\GetShipping\Dto\GetShippingOutput;
use App\WebshopBundle\Domain\Model\Shipping\ShippingRepositoryInterface;

class GetShippingHandler
{
    private ShippingRepositoryInterface $shippingRepository;

    public function __construct(ShippingRepositoryInterface $shippingRepository)
    {
        $this->shippingRepository = $shippingRepository;
    }

    public function __invoke(GetShippingQuery $createCheckoutQuery){
        $shippingMethods = $this->shippingRepository->getShippingMethodsByCartTotal($createCheckoutQuery->getCartTotal());
        return new GetShippingOutput($shippingMethods->getShippingMethods());
    }
}