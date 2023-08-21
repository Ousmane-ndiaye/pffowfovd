<?php

namespace App\Repository;

use App\Entity\Usersecteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Usersecteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usersecteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usersecteur[]    findAll()
 * @method Usersecteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersecteurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Usersecteur::class);
    }

    // /**
    //  * @return Usersecteur[] Returns an array of Usersecteur objects
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
    public function findOneBySomeField($value): ?Usersecteur
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
