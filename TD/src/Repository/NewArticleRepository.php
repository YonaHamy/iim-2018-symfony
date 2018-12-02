<?php

namespace App\Repository;

use App\Entity\NewArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NewArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewArticle[]    findAll()
 * @method NewArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NewArticle::class);
    }

    // /**
    //  * @return NewArticle[] Returns an array of NewArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewArticle
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
