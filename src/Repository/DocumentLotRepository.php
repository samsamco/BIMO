<?php

namespace App\Repository;

use App\Entity\DocumentLot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DocumentLot|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentLot|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentLot[]    findAll()
 * @method DocumentLot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentLotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentLot::class);
    }

    // /**
    //  * @return DocumentLot[] Returns an array of DocumentLot objects
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
    public function findOneBySomeField($value): ?DocumentLot
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
