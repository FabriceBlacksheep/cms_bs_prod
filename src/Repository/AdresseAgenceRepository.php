<?php

namespace App\Repository;

use App\Entity\AdresseAgence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdresseAgence>
 *
 * @method AdresseAgence|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdresseAgence|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdresseAgence[]    findAll()
 * @method AdresseAgence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdresseAgenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdresseAgence::class);
    }

    public function save(AdresseAgence $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AdresseAgence $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AdresseAgence[] Returns an array of AdresseAgence objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AdresseAgence
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
