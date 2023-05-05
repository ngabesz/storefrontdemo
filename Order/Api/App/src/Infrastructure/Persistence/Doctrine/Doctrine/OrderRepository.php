<?php

use App\Domain\Order\Order;
use App\Domain\Order\OrderRepositoryInterface;
use App\Domain\Order\Specification\OrderSpecification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OrderRepository extends ServiceEntityRepository implements OrderRepositoryInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        // todo Cart csere
//        parent::__construct($registry, Cart::class);
    }

    public function add(Order $order)
    {
        // TODO: Implement add() method.
    }


    public function query(OrderSpecification $orderSpecification): array
    {
        // TODO: Implement query() method.
    }
}
