<?php

namespace App\Repository;

use App\Entity\Inscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Inscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inscription[]    findAll()
 * @method Inscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inscription::class);
    }

    public function findInscriptionEA($idEmploye)
    {
        $e = 'E';
        $a = 'A';
        $queryBuilder = $this
            ->createQueryBuilder('inscription')
            ->setParameter('e', $e)
            ->setParameter('a', $a)
            ->setParameter('idEmploye', $idEmploye)
            ->where('(inscription.statut = :e or inscription.statut = :a) and inscription.employe = :idEmploye');
        return $queryBuilder->getQUery()->getResult();
    }

    public function findFormationE()
    {
        $e = 'E';
        $queryBuilder = $this
            ->createQueryBuilder('inscription')
            ->setParameter('e', $e)
            ->where('inscription.statut = :e');
        return $queryBuilder->getQUery()->getResult();
    }

    public function findInscriptionByServiceAndEmploye($idEmploye, $idService)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createquery(
            'SELECT inscription.id
            FROM App\Entity\Produit p
            INNER JOIN p.formations f
            INNER JOIN f.inscriptions i
            WHERE i.employe = :idEmploye AND p.service = :idService
            '
        )
        ->setParameter('idEmploye', $idEmploye)
        ->setParameter('idService', $idService)
        ;

        return $query->getOneOrNullResult();
    }

// SELECT produit.libelle
// FROM produit
// INNER JOIN formation ON formation.produit_id = produit.id
// INNER JOIN inscription ON inscription.formation_id = formation.id
// WHERE inscription.employe_id = 14 AND produit.services_id = 9;
    // /**
    //  * @return Inscription[] Returns an array of Inscription objects
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
    public function findOneBySomeField($value): ?Inscription
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
