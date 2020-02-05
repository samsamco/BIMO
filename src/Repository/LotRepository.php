<?php

namespace App\Repository;

use App\Entity\Lot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Lot|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lot|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lot[]    findAll()
 * @method Lot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lot::class);
    }

    // /**
    //  * @return Lot[] Returns an array of Lot objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lot
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

   public function findSearch($region,$departement,$villes,$type,$budget,$nbrPieces)
    {

        $querybuilder =  $this->createQueryBuilder('lot');

        if(isset($region))
        {
            $querybuilder->innerJoin('App\Entity\Residence','residence','WITH', 'residence.id = lot.residence')
            ->innerJoin('App\Entity\City','city','WITH', 'city.id = residence.city')
            ->innerJoin('App\Entity\Department','department','WITH', 'department.id = city.department')
            ->andWhere('department.region = :region ')
            ->setParameter('region', $region);
        }

        if(isset($departement))
        {
            if(!isset($region))
            {
                $querybuilder->innerJoin('App\Entity\Residence','residence','WITH', 'residence.id = lot.residence')
                    ->innerJoin('App\Entity\City','city','WITH', 'city.id = residence.city')
                    ->innerJoin('App\Entity\Department','department','WITH', 'department.id = city.department')
                    ->andWhere('department.id = :department')
                    ->setParameter('department', $departement);
            }
            else
            {
                $querybuilder->andWhere('department.id = :department')
                ->setParameter('department', $departement);
            }
            
        }

        if(isset($villes))
        {
            if(!isset($departement))
            {
                $querybuilder->innerJoin('App\Entity\Residence','residence','WITH', 'residence.id = lot.residence')
                    ->innerJoin('App\Entity\City','city','WITH', 'city.id = residence.city')
                    ->innerJoin('App\Entity\Department','department','WITH', 'department.id = city.department')
                    ->andWhere('city.id IN (:villes)')
                    ->setParameter('villes', $villes);
            }
            else
            {
                $querybuilder->andWhere('city.id IN (:villes)')
                    ->setParameter('villes', $villes);
            }
            
        }


        if(isset($type))
        {
               $querybuilder->innerJoin('App\Entity\Nature','nature','WITH', 'nature.id = lot.nature')
                    ->andWhere('nature.id  = :type ')
                    ->setParameter('type', $type); 
        }

        if(isset($budget))
        {
               $querybuilder->andWhere('lot.immo_price between :budget_min and  :budget_max ')
                    ->setParameter('budget_min', $budget['min'])
                    ->setParameter('budget_max', $budget['max']);
        }

        if(isset($nbrPieces))
        {
               $querybuilder->andWhere('lot.nb_pieces  = :nbpieces ')
                    ->setParameter('nbpieces', $nbrPieces); 
        }

        return $querybuilder->select('lot')
        ->getQuery()
        ->getResult();
      

    }



    /********************* Repo old *************/

    

    public function findAllOrientation()
    {
        return $this->createQueryBuilder('r')
            ->select('distinct r.primary_orientation')
            ->orderBy('r.primary_orientation', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAllEtage()
    {
        return $this->createQueryBuilder('r')
            ->select('distinct r.floor')
            ->orderBy('r.floor', 'ASC')
            ->getQuery()
            ->getResult();
    }


    public function findDataSearching($data, $d)
    {

        // $city=$data['city'];
        // $codepostal=$data['codepostal'];
        // $typeBien=$data['typeBien'];
        // $orientation=$data['orientation'];
        // $etage=$data['etage'];
        // $periode=$data['periode'];
        // $Budget1=$data['Budget1'];
        // $Budget2=$data['Budget2'];
        // $Actable=$data['Actable'];

        $regions = [];
        $departements = [];
        $code_postal = [];

        if ($data['regions'] != null and $data['departements'] == null) {
            foreach ($d as $k => $v) {
                if (trim(strtolower($data['regions'])) == trim(strtolower($v['region']))) {
                    if (isset($v['code_postal']) and is_array($v['code_postal'])) {
                        foreach ($v['code_postal'] as $kk => $vv) {
                            $regions[] = $vv;
                        }
                    }
                }
            }
        }

        if ($data['departements'] != null) {
            foreach ($d as $k => $v) {
                if (trim(strtolower($data['departements'])) == trim(strtolower($v['departement']))) {
                    if (isset($v['code_postal']) and is_array($v['code_postal'])) {
                        foreach ($v['code_postal'] as $kk => $vv) {
                            $departements[] = $vv;
                        }
                    }
                }
            }
        }


        if ($regions and count($departements) == 0) {
            $code_postal = array_filter($regions);
        }
        if (count($regions) == 0 and $departements) {
            $code_postal = array_filter($departements);
        }
        if ($regions and $departements) {
            $code_postal = array_filter(array_merge($regions, $departements));
        }

        $db = $this->createQueryBuilder('l')->select('l.floor,nature.nature,city.name,r.name,r.postal_code,r.ref,r.name,r.postal_code,r.area,r.address,l.ref as lotIdentifant,l.building,l.building_number,l.appartment_rent,l.primary_orientation, l.option_prices,r.actable,r.commercial_delivery');

         $db->join('l.residence', 'r');
         $db->join('r.city', 'city');
         $db->join('r.partner', 'partner');
         $db->join('l.nature', 'nature');

        if (isset($data['codepostal'])) {
            if (!empty($data['codepostal'])) {
                //echo '<br>'.$data['codepostal'];

                $db->andWhere('r.postal_code LIKE :codepostal');
                $db->setParameter('codepostal', $data['codepostal'] . '%');

            }
        }


        if (isset($data['etage'])) {
            //echo '<br>etage : '.$data['etage'];

            $db->andWhere('l.floor IN(:etage)');
            $db->setParameter('etage', $data['etage']);
        }

        if (isset($data['city'])) {

            $db->andWhere('city.id IN(:ville)');
            $db->setParameter('ville', $data['city']);
        }

        if (isset($data['partenaire'])) {

            $db->andWhere('partner.id IN(:partner)');
            $db->setParameter('partner', $data['partenaire']);
        }

        if (isset($data['type']) && $data['type']!=-1) {
            $db->andWhere('nature.id IN(:type)');
            $db->setParameter('type', $data['type']);
        }

        if (isset($data['orientation'])) {


            $db->andWhere('l.primary_orientation IN(:orientation)');
            $db->setParameter('orientation', $data['orientation']);

        }

        if (isset($data['Budget1'])) {
            if (!empty($data['Budget1'])) {
                //echo '<br>Budget1 :'.$data['Budget1'];


                $db->andWhere('l.option_prices >= :Budget1');
                $db->setParameter('Budget1', $data['Budget1']);
            }
        }

        if (isset($data['Budget2'])) {

            if (!empty($data['Budget2'])) {
                //echo '<br>Budget2 : '.$data['Budget2'];


                $db->andWhere('l.option_prices <= :Budget2');
                $db->setParameter('Budget2', $data['Budget2']);

            }
        }

        if (isset($data['Actable'])) {

            if ($data['Actable'] == 1) {

                $db->andWhere('r.actable = :actabilite');
                $db->setParameter('actabilite', 'Actable');
                //echo '<br>Actable : '.$data['Actable'];

            } else {
                //echo '<br>Actable : '.$data['Actable'];

                //$db->andWhere('r.actabilite <> :actabilite');
                //$db->setParameter('actabilite', 'Actable');

            }

        }


        if (isset($data['nbpieces'])) {
            //echo '<br>etage : '.$data['etage'];

            $db->andWhere('l.nb_pieces = :nbp ');
            $db->setParameter('nbp', $data['nbpieces']);
        }

        // echo '<br> periode1:-->'.$data['periode'];

        if (isset($data['periode']) and $data['periode'] != 0) {

            $db->andWhere('r.commercial_delivery LIKE :periode ');
            $db->setParameter('periode', '%' . $data['periode'] . '%');

        }

        if ($code_postal) {
            $db->andWhere('r.postal_code IN (:code_postal)');
            $db->setParameter('code_postal', $code_postal);
        }

//        if (count($code_postal)) {
//            foreach ($code_postal as $k => $v) {
//                $db->orWhere('r.codepostal = :code_postal');
//                $db->setParameter('code_postal', $v);
//            }
//        }

        $Rqb = $db->getQuery();

//        echo $Rqb->getSQL();
//        die;

        $db_Result = $Rqb->getResult();

        return $db_Result;
    }


    public function findLotByIdentifiant($Idlot)
    {


        $db = $this->createQueryBuilder('l')->select(array('l'));

        $db->join('l.residence', 'r');

        $db->Where('l.ref = :Idlot ');
        $db->addSelect(array('r'));
        $db->setParameter('Idlot', $Idlot);

        $Rqb = $db->getQuery();

        $db_Result = $Rqb->getArrayResult();

        return $db_Result;


    }

}
