<?php

namespace App\Repository;

use App\Entity\Documents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Documents|null find($id, $lockMode = null, $lockVersion = null)
 * @method Documents|null findOneBy(array $criteria, array $orderBy = null)
 * @method Documents[]    findAll()
 * @method Documents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Documents::class);
    }

    // /**
    //  * @return Documents[] Returns an array of Documents objects
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
    public function findOneBySomeField($value): ?Documents
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    public function findByLotDocuments($Idlot)
    {


        $db=$this->createQueryBuilder('d')->select('d.url,d.type');

        $db->join('d.LotDocuments', 'l');

        $db->Where('l.id = :Idlot ');
        $db->setParameter('Idlot', $Idlot);


        $Rqb=$db->getQuery();

        $db_Result=$Rqb->getArrayResult();

        return $db_Result;

    }

    public function findByResDocuments($Idres)
    {


        $db=$this->createQueryBuilder('d')->select('d.url,d.type');

        $db->join('d.ResDocuments', 'r');

        $db->Where('r.id = :Idres ');
        $db->setParameter('Idres', $Idres);


        $Rqb=$db->getQuery();

        $db_Result=$Rqb->getArrayResult();

        return $db_Result;

    }

}
