<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Checkout;
use App\Domain\CheckoutRepositoryInterface;
use App\Domain\Shared\EntityId;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CheckoutRepository extends ServiceEntityRepository implements CheckoutRepositoryInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Checkout::class);
    }

    private function persist(Checkout $checkout): void
    {
        $this->_em->persist($checkout);
        $this->_em->flush();
    }

    public function createCheckout(Checkout $checkout): void
    {
        $this->persist($checkout);
    }

    public function updateCheckout(Checkout $checkout): void
    {
        $this->persist($checkout);
    }

    public function findCheckout(EntityId $entityId): ?Checkout
    {
        return $this->find($entityId->value);
    }
}