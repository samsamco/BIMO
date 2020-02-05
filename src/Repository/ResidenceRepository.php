<?php

namespace App\Repository;

use App\Entity\Residence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Residence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Residence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Residence[]    findAll()
 * @method Residence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResidenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Residence::class);
    }

    // /**
    //  * @return Residence[] Returns an array of Residence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Residence
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findSearch($region,$departement,$villes,$type,$budget)
    {

        return $this->createQueryBuilder('residence')
            ->innerJoin('App\Entity\City','city','WITH', 'city.id = residence.city')
            ->innerJoin('App\Entity\Department','department','WITH', 'department.id = city.department')

            ->getQuery()
            ->getResult();
    }

    /********************* Repo old **********/

     public function findAllCity()
    {
        return $this->createQueryBuilder('r')
            ->innerJoin('App\Entity\City','city','WITH', 'city.id = r.city')
            ->select('city')
            ->orderBy('city.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
    

    public function findAllType()
    {
        return $this->createQueryBuilder('r')
            ->select('distinct r.type')
            ->orderBy('r.ville', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


}
