<?php

namespace App\Repository;

use App\Entity\Entreprisesecteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Entreprisesecteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entreprisesecteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entreprisesecteur[]    findAll()
 * @method Entreprisesecteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntreprisesecteurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Entreprisesecteur::class);
    }

    // /**
    //  * @return Entreprisesecteur[] Returns an array of Entreprisesecteur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Entreprisesecteur
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
