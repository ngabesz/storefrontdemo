<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Order\Order;
use App\Domain\Order\OrderRepositoryInterface;
use App\Domain\Order\Specification\OrderSpecification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OrderRepository extends ServiceEntityRepository implements OrderRepositoryInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function add(Order $order): Order
    {
        $this->_em->persist($order);
        $this->_em->flush();

        return $order;
    }

    public function query(OrderSpecification $orderSpecification): array
    {
        // TODO: Implement query() method.
    }
}
