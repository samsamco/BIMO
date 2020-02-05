<?php

namespace App\Repository;

use App\Entity\DocumentRes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DocumentRes|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentRes|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentRes[]    findAll()
 * @method DocumentRes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentResRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentRes::class);
    }

    // /**
    //  * @return DocumentRes[] Returns an array of DocumentRes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentRes
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
