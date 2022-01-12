<?php

namespace App\Repository;

use App\Entity\Wish;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use function Symfony\Component\String\s;

/**
 * @method Wish|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wish|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wish[]    findAll()
 * @method Wish[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WishRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wish::class);
    }

    public function findBestWish(){
/*
        // En DQL
        $entityManager = $this->getEntityManager();
        $dql= "
            SELECT w 
            FROM App\Entity\Wish w
            WHERE w.isPubliched = 0
            ORDER BY w.author
        ";
        $query = $entityManager->createQuery($dql);
*/

        // Version QueryBuilder
        $queryBuilder = $this->createQueryBuilder('w');
        $queryBuilder->andWhere('w.isPubliched = 1');
        $queryBuilder->addOrderBy('w.author', 'DESC');
        $query = $queryBuilder->getQuery();

        // Ligne utilisé dans les deux versions.
        $query->setMaxResults(20);
        $result = $query->getResult();

        return $result;
    }
}
