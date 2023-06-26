<?php

namespace App\Repository;

use App\Entity\ScopesToRole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;
use function array_merge;
use function array_unique;

/**
 * @extends ServiceEntityRepository<ScopesToRole>
 *
 * @method ScopesToRole|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScopesToRole|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScopesToRole[]    findAll()
 * @method ScopesToRole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScopesToRoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScopesToRole::class);
    }

    /**
     * @param array $roles
     * @return string[]
     */
    public function findAllScopesToRoles(array $roles): array
    {
        $scopeToRoles = $this->createQueryBuilder('str')
            ->where('str.role IN (:roles)')
            ->setParameter('roles', $roles)
            ->getQuery()
            ->getResult();

        $forMerge = [];
        /** @var ScopesToRole $scopeToRole */
        foreach ($scopeToRoles as $scopeToRole) {
            $forMerge = array_merge($forMerge, $scopeToRole->getScopes());
        }

        return array_unique($forMerge);
    }
}
