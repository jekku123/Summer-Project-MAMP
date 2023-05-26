<?php

namespace App\Repository;

use App\Entity\ConferenceSpeaker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConferenceSpeaker>
 *
 * @method ConferenceSpeaker|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConferenceSpeaker|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConferenceSpeaker[]    findAll()
 * @method ConferenceSpeaker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConferenceSpeakerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConferenceSpeaker::class);
    }

    public function save(ConferenceSpeaker $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ConferenceSpeaker $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ConferenceSpeaker[] Returns an array of ConferenceSpeaker objects
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

//    public function findOneBySomeField($value): ?ConferenceSpeaker
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
