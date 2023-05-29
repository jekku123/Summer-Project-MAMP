<?php

namespace App\Repository;

use App\Entity\WorkshopSpeaker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WorkshopSpeaker>
 *
 * @method WorkshopSpeaker|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkshopSpeaker|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkshopSpeaker[]    findAll()
 * @method WorkshopSpeaker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkshopSpeakerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkshopSpeaker::class);
    }

    public function save(WorkshopSpeaker $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(WorkshopSpeaker $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return WorkshopSpeaker[] Returns an array of WorkshopSpeaker objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WorkshopSpeaker
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
