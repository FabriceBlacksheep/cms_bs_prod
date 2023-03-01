<?php

namespace App\Repository;

use App\Entity\AgenceAdresse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AgenceAdresse>
 *
 * @method AgenceAdresse|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgenceAdresse|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgenceAdresse[]    findAll()
 * @method AgenceAdresse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgenceAdresseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgenceAdresse::class);
    }

    public function save(AgenceAdresse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AgenceAdresse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AgenceAdresse[] Returns an array of AgenceAdresse objects
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

//    public function findOneBySomeField($value): ?AgenceAdresse
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
