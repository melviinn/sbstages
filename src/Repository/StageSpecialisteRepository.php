<?php

namespace App\Repository;

use App\Entity\StageSpecialiste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StageSpecialiste>
 *
 * @method StageSpecialiste|null find($id, $lockMode = null, $lockVersion = null)
 * @method StageSpecialiste|null findOneBy(array $criteria, array $orderBy = null)
 * @method StageSpecialiste[]    findAll()
 * @method StageSpecialiste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StageSpecialisteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StageSpecialiste::class);
    }

    public function save(StageSpecialiste $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StageSpecialiste $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return StageSpecialiste[] Returns an array of StageSpecialiste objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StageSpecialiste
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
