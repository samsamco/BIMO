<?php

namespace App\Repository;

use App\Entity\TypeAnnexe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeAnnexe|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAnnexe|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAnnexe[]    findAll()
 * @method TypeAnnexe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAnnexeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeAnnexe::class);
    }

    // /**
    //  * @return TypeAnnexe[] Returns an array of TypeAnnexe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeAnnexe
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
