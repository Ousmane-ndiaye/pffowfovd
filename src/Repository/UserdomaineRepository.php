<?php

namespace App\Repository;

use App\Entity\Userdomaine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Userdomaine|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userdomaine|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userdomaine[]    findAll()
 * @method Userdomaine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserdomaineRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Userdomaine::class);
    }

    // /**
    //  * @return Userdomaine[] Returns an array of Userdomaine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Userdomaine
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
