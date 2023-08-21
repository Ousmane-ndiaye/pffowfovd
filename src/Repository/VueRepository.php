<?php

namespace App\Repository;

use App\Entity\Vue;
use App\Entity\User;
use App\Entity\Infoprofil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vue[]    findAll()
 * @method Vue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vue::class);
    }

    // /**
    //  * @return Vue[] Returns an array of Vue objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    public function ifIsVisitedToday(Infoprofil $infoProfil, User $visiteur): ?Vue
    {
        $today = new \DateTime('now');
        $today->sub(new \DateInterval('PT8H'));
        return $this->createQueryBuilder('v')
            ->andWhere('v.dateVue > :date')
            ->andWhere('v.infoProfil = :infoProfil')
            ->andWhere('v.visiteur = :visiteur')
            ->setParameter('date', $today)
            ->setParameter('infoProfil', $infoProfil)
            ->setParameter('visiteur', $visiteur)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /* public function getByDate(\Datetime $date)
    {
        $from = new \DateTime($date->format("now") . " 00:00:00");
        $to   = new \DateTime($date->format("Y-m-d") . " 23:59:59");

        $qb = $this->createQueryBuilder("e");
        $qb
            ->andWhere('e.date BETWEEN :from AND :to')
            ->setParameter('from', $from)
            ->setParameter('to', $to);
        $result = $qb->getQuery()->getResult();

        return $result;
    } */
}
