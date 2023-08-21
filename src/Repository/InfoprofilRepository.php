<?php

namespace App\Repository;

use App\Entity\Infoprofil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Infoprofil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Infoprofil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Infoprofil[]    findAll()
 * @method Infoprofil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoprofilRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Infoprofil::class);
    }

    // /**
    //  * @return Infoprofil[] Returns an array of Infoprofil objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Infoprofil
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
