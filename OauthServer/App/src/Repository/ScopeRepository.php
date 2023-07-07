<?php

namespace App\Repository;

use App\Entity\ScopesToRole;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use League\Bundle\OAuth2ServerBundle\Converter\ScopeConverterInterface;
use League\Bundle\OAuth2ServerBundle\Manager\ScopeManagerInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Repositories\ScopeRepositoryInterface;
use Psr\Log\LoggerInterface;
use League\Bundle\OAuth2ServerBundle\ValueObject\Scope as LeagueScope;

use function print_r;

final class ScopeRepository implements ScopeRepositoryInterface
{
    private ScopeConverterInterface $scopeConverter;
    private LoggerInterface $logger;
    private ScopeManagerInterface $scopeManager;
    private EntityManagerInterface $entityManager;

    public function __construct(
        ScopeManagerInterface $scopeManager,
        LoggerInterface $logger,
        ScopeConverterInterface $scopeConverter,
        EntityManagerInterface $entityManager
    ) {
        $this->logger = $logger;
        $this->scopeConverter = $scopeConverter;
        $this->scopeManager = $scopeManager;
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getScopeEntityByIdentifier($identifier)
    {
        $scope = $this->scopeManager->find($identifier);

        $this->logger->info($identifier);

        if (null === $scope) {
            return null;
        }

        return $this->scopeConverter->toLeague($scope);
    }

    /**
     * @param ScopeEntityInterface[] $scopes
     * @param string $grantType
     * @param string|null $userIdentifier
     *
     * @return list<ScopeEntityInterface>
     */
    public function finalizeScopes(
        array $scopes,
        $grantType,
        ClientEntityInterface $clientEntity,
        $userIdentifier = null
    ): array {
        $user = $this->getUserRepo()->findOneBy(['email' => $userIdentifier]);
        $this->logger->info($user->getIdentifier() . ' | roles: ' . print_r($user->getRoles(), true));

        $rawScopes = $this->getScopesToRoleRepo()->findAllScopesToRoles($user->getRoles());
        $this->logger->info(print_r($rawScopes, true));

        $scopesResult = [];
        foreach ($rawScopes as $rawScope) {
            $scopesResult[] = new LeagueScope($rawScope);
        }

        return $this->scopeConverter->toLeagueArray($scopesResult);
    }

    private function getUserRepo(): UserRepository
    {
        return $this->entityManager->getRepository(User::class);
    }

    private function getScopesToRoleRepo(): ScopesToRoleRepository
    {
        return $this->entityManager->getRepository(ScopesToRole::class);
    }
}