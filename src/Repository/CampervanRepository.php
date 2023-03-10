<?php

namespace App\Repository;

use App\Entity\Campervan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Campervan>
 *
 * @method Campervan|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campervan|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campervan[]    findAll()
 * @method Campervan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampervanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Campervan::class);
    }

    public function save(Campervan $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Campervan $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // get caracteristique by campervan
    public function getCaracteristiqueByCampervan($id)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT c
            FROM App\Entity\VanCaracteristique c
            JOIN c.campervan v
            WHERE v.id = :id'
        )->setParameter('id', $id);

        // returns an array of Product objects
        return $query->getResult();
    }

//    /**
//     * @return Campervan[] Returns an array of Campervan objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Campervan
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
