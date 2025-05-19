<?php

declare(strict_types=1);

namespace Softylines\SyliusTestimonialPlugin\Repository;

use Softylines\SyliusTestimonialPlugin\Entity\Testimonial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class TestimonialRepository extends ServiceEntityRepository implements RepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testimonial::class);
    }

    public function createPaginator(array $criteria = [], array $sorting = []): iterable
    {
        $queryBuilder = $this->createQueryBuilder('o');

        if (!empty($sorting)) {
            foreach ($sorting as $property => $order) {
                $queryBuilder->addOrderBy('o.' . $property, $order);
            }
        }

        return $this->getPaginator($queryBuilder);
    }

    public function findActiveTestimonials(): array
    {
        return $this->createQueryBuilder('o')
            ->where('o.enabled = :enabled')
            ->setParameter('enabled', true)
            ->orderBy('o.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function add($resource): void
    {
        $this->getEntityManager()->persist($resource);
        $this->getEntityManager()->flush();
    }

    public function remove($resource): void
    {
        $this->getEntityManager()->remove($resource);
        $this->getEntityManager()->flush();
    }
}
