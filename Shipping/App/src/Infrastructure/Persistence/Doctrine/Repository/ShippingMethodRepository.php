<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\ShippingMethod;
use App\Domain\ShippingMethodRepositoryInterface;
use App\Infrastructure\Exception\ShippingMethodNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ShippingMethod>
 *
 * @method ShippingMethod|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShippingMethod|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShippingMethod[]    findAll()
 * @method ShippingMethod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShippingMethodRepository extends ServiceEntityRepository implements ShippingMethodRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShippingMethod::class);
    }

    public function createShippingMethod(ShippingMethod $entity): void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function deleteShippingMethod(string $shippingMethodId): void
    {
        $shippingMethod = $this->getShippingMethodById($shippingMethodId);
        $this->getEntityManager()->remove($shippingMethod);
        $this->getEntityManager()->flush();
    }


    public function fetchShippingMethods(?float $cartTotal): array
    {
        $shippingMethods = $this->findAll();

        if ($cartTotal === null) {
            return $shippingMethods;
        }

        $filteredShippingMethods = [];

        foreach ($shippingMethods as $shippingMethod) {
            $shippingLanes = $shippingMethod->getShippingLanes();
            foreach ($shippingLanes as $shippingLane) {
                if ($shippingLane->getMinGrossPrice() <= $cartTotal && $shippingLane->getMaxGrossPrice() >= $cartTotal) {
                    $filteredShippingMethods[] = $shippingMethod;
                    break;
                }
            }
        }

        return $filteredShippingMethods;
    }

    public function getShippingMethodById(string $shippingMethodId): ShippingMethod
    {
        $shippingMethod = $this->findOneBy(["id" => $shippingMethodId]);

        if (!$shippingMethod) {
            throw new ShippingMethodNotFoundException('shipping method not found with id: ' . $shippingMethodId);
        }

        return $shippingMethod;
    }
}
